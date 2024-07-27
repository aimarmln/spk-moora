<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use App\Models\MooraNilai;
use App\Models\MooraKriteria;
use App\Models\MooraAlternatif;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MooraController extends Controller
{
    public function mooraProses()
    {
        $kriteria = $this->kriteria();
        $alternatif = $this->alternatif();
        $sample = $this->nilai();

        $title = 'Metode Proses';
        $role = 'user';

        return view('user.moora_proses', compact('kriteria', 'alternatif', 'sample', 'title', 'role'));
    }

    public function mooraNormalisasi() 
    {
        [$kriteria, $alternatif, $normal] = $this->normalisasi();

        $title = 'Moora Normalisasi';
        $role = 'user';

        return view('user.moora_normalisasi', compact('kriteria', 'alternatif', 'normal', 'title', 'role'));
    }

    public function mooraHasilOptimasi() 
    {
        [$alternatif, $optimasi] = $this->optimasi();

        $title = 'Moora Hasil Optimasi';
        $role = 'user';

        return view('user.moora_hasil_optimasi', compact('alternatif', 'optimasi', 'title', 'role'));
    }

    public function mooraPerangkingan()
    {
        [$alternatif, $optimasi] = $this->optimasi();

        arsort($optimasi);
        $index = key($optimasi);
        $hasilAlternatif = $alternatif[$index][1] ?? 'Belum ada!';
        $hasilOptimasi = $optimasi[$index] ?? 'Belum ada!';
        $rank = 1;

        $title = 'Perangkingan';
        $role = 'user';

        return view('user.perangkingan', compact('alternatif', 'optimasi', 'hasilAlternatif', 'hasilOptimasi', 'rank', 'title', 'role'));
    }

    public function cetak()
    {
        [$alternatif, $optimasi] = $this->optimasi();
        arsort($optimasi);
        $rank = 1;

        return view('user.cetak', compact('alternatif', 'optimasi', 'rank'));
    }

    public function process(Request $request)
    {
        if ($request->has('proses')) {
            $dataSiswa = DataSiswa::orderByRaw('ABS(jarak - jarak)')
                    ->orderByRaw('ABS(rata_nilai - rata_nilai)')
                    ->orderByRaw('ABS(penghasilan - penghasilan)')
                    ->orderByRaw('ABS(tanggungan - tanggungan)')
                    ->orderByRaw('ABS(pendidikan - pendidikan)')
                    ->orderByRaw('ABS(kehadiran - kehadiran)')
                    ->limit(100)
                    ->get();

            $kriteria = MooraKriteria::all();
            $data_post = [];

            foreach ($dataSiswa as $row) {
                $data_post[] = [
                    'id_alternatif' => $row->id_siswa,
                    'id_siswa' => $row->id_siswa,
                    'alternatif' => $row->nama_siswa,
                    'jarak' => $row->jarak,
                    'rata_nilai' => $row->rata_nilai,
                    'penghasilan' => $row->penghasilan,
                    'tanggungan' => $row->tanggungan,
                    'pendidikan' => $row->pendidikan,
                    'kehadiran' => $row->kehadiran
                ];
            }

            foreach ($data_post as $value) {
                // Calculate values based on criteria
                $jarak_hasil = $this->calculateJarak($value['jarak']);
                $penghasilan_hasil = $this->calculatePenghasilan($value['penghasilan']);
                $tanggungan_hasil = $this->calculateTanggungan($value['tanggungan']);
                $pendidikan_hasil = $this->calculatePendidikan($value['pendidikan']);
                $kehadiran_hasil = $this->calculateKehadiran($value['kehadiran']);
                $rata_nilai_hasil = $this->calculateRataNilai($value['rata_nilai']);

                $nilai = [
                    $penghasilan_hasil,
                    $jarak_hasil,
                    $tanggungan_hasil,
                    $pendidikan_hasil,
                    $rata_nilai_hasil,
                    $kehadiran_hasil
                ];

                MooraAlternatif::create([
                    'id_alternatif' => $value['id_alternatif'],
                    'id_siswa' => $value['id_siswa'],
                    'alternatif' => $value['alternatif'],
                    'jarak' => $value['jarak'],
                    'rata_nilai' => $value['rata_nilai'],
                    'penghasilan' => $value['penghasilan'],
                    'tanggungan' => $value['tanggungan'],
                    'pendidikan' => $value['pendidikan'],
                    'kehadiran' => $value['kehadiran']
                ]);

                foreach ($kriteria as $index => $k) {
                    MooraNilai::create([
                        'id_alternatif' => $value['id_alternatif'],
                        'id_kriteria' => $k->id_kriteria,
                        'nilai' => $nilai[$index]
                    ]);
                }
            }

            return redirect()->route('moora-proses')->with('success', 'Proses berhasil!');
        } elseif ($request->has('kosongkan')) {
            DB::table('moora_alternatif')->truncate();
            DB::table('moora_nilai')->truncate();

            return redirect()->route('moora-proses')->with('success', 'Berhasil mengosongkan tabel!');
        }
    }

    // mengambil nilai kriteria 
    private function kriteria()
    {
        $kriteriaResults = MooraKriteria::all();
        $kriteria = [];
        foreach ($kriteriaResults as $row) {
            $kriteria[$row->id_kriteria] = [
                $row->kriteria,
                $row->type,
                $row->bobot,
            ];
        }

        return $kriteria;
    }

    // mena
    private function alternatif() 
    {
        $alternatifResults = MooraAlternatif::all();
        $alternatif = [];
        foreach ($alternatifResults as $row) {
            $alternatif[$row->id_alternatif] = [
                $row->id_alternatif,
                $row->alternatif,
                $row->penghasilan,
                $row->jarak,
                $row->tanggungan,
                $row->rata_nilai,
                $row->pendidikan,
                $row->kehadiran,
            ];
        }

        return $alternatif;
    }

    private function nilai()
    {
        $sampleResults = MooraNilai::all();
        $sample = [];
        foreach ($sampleResults as $row) {
            if (!isset($sample[$row->id_alternatif])) {
                $sample[$row->id_alternatif] = [];
            }
            $sample[$row->id_alternatif][$row->id_kriteria] = $row->nilai;
        }

        return $sample;
    }

    private function normalisasi() 
    {
        $kriteria = $this->kriteria();
        $alternatif = $this->alternatif();
        $sample = $this->nilai();
        $normal = $sample;
        foreach ($kriteria as $id_kriteria => $k) {
            $pembagi = 0;
            foreach ($alternatif as $id_alternatif => $a) {
                $pembagi += pow($sample[$id_alternatif][$id_kriteria], 2);
            }
            foreach ($alternatif as $id_alternatif => $a) {
                $normal[$id_alternatif][$id_kriteria] /= sqrt($pembagi);
            }
        }

        return [$kriteria, $alternatif, $normal];
    }


    private function optimasi()
    {
        $alternatif = $this->alternatif();
        $kriteria = $this->kriteria();
        $normal = $this->normalisasi()[2]; // Ambil normalisasi dari hasil normalisasi()
        $optimasi = [];

        foreach ($alternatif as $id_alternatif => $a) {
            $optimasi[$id_alternatif] = 0;
            foreach ($kriteria as $id_kriteria => $k) {
                // Akses data normalisasi
                $normal_value = $normal[$id_alternatif][$id_kriteria] ?? 0;
                $type_factor = ($k[1] == 'Benefit') ? 1 : -1;
                $bobot = $k[2];
                
                // Pastikan operasi dilakukan dengan nilai numerik
                if (is_numeric($normal_value) && is_numeric($bobot)) {
                    $optimasi[$id_alternatif] += $normal_value * $type_factor * $bobot;
                }
            }
        }

        return [$alternatif, $optimasi];
    }

    private function calculateJarak($jarak)
    {
        if ($jarak <= 1) {
            return 10;
        } elseif ($jarak <= 2) {
            return 20;
        } elseif ($jarak <= 4) {
            return 30;
        } elseif ($jarak <= 6) {
            return 40;
        } else {
            return 40;
        }
    }

    private function calculatePenghasilan($penghasilan)
    {
        if ($penghasilan === 'Rp 50.000 - Rp 1.000.000') {
            return 10;
        } elseif ($penghasilan === 'Rp 1.000.000 - Rp 2.000.000') {
            return 20;
        } elseif ($penghasilan === 'Rp 2.000.000 - Rp 4.000.000') {
            return 40;
        } elseif ($penghasilan === 'Lebih dari Rp 4.000.000') {
            return 50;
        } else {
            return 10;
        }
    }

    private function calculateTanggungan($tanggungan)
    {
        if ($tanggungan <= 3) {
            return 20;
        } elseif ($tanggungan <= 5) {
            return 30;
        } elseif ($tanggungan <= 8) {
            return 40;
        } else {
            return 40;
        }
    }

    private function calculatePendidikan($pendidikan)
    {
        if ($pendidikan === 'SD') {
            return 50;
        } elseif ($pendidikan === 'SMP') {
            return 40;
        } elseif ($pendidikan === 'SMA') {
            return 30;
        } elseif ($pendidikan === 'DIPLOMA') {
            return 20;
        } elseif ($pendidikan === 'SARJANA') {
            return 10;
        } else {
            return 10;
        }
    }

    private function calculateKehadiran($kehadiran)
    {
        if ($kehadiran <= 60) {
            return 10;
        } elseif ($kehadiran <= 69) {
            return 10;
        } elseif ($kehadiran <= 89) {
            return 20;
        } elseif ($kehadiran <= 100) {
            return 30;
        } else {
            return 30;
        }
    }

    private function calculateRataNilai($ratanilai)
    {
        if ($ratanilai <= 59) {
            return 10;
        } elseif ($ratanilai <= 60) {
            return 10;
        } elseif ($ratanilai <= 80) {
            return 20;
        } elseif ($ratanilai <= 90) {
            return 30;
        } elseif ($ratanilai <= 100) {
            return 40;
        } else {
            return 40;
        }
    }
}
