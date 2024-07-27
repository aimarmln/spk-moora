<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use App\Models\MooraKriteria;
use Illuminate\Http\Request;

class DataSiswaController extends Controller
{
    public function admin() 
    {
        $dataSiswa = DataSiswa::all();
        $mooraKriteria = MooraKriteria::all();

        $title = 'Data Siswa';
        $role = 'admin';

        return view('admin.data_siswa', compact('dataSiswa', 'mooraKriteria', 'title', 'role'));
    }

    public function user() 
    {
        $dataSiswa = DataSiswa::all();
        $mooraKriteria = MooraKriteria::all();

        $title = "Data Siswa";
        $role = "user";

        return view('user.data_siswa', compact('dataSiswa', 'mooraKriteria', 'title', 'role'));
    }

    public function create()
    {
        $maxIdSiswa = DataSiswa::max('id_siswa') ?? 0;
        $idSiswa = $maxIdSiswa + 1;

        $title = 'Tambah Data Siswa';
        $role = 'admin';

        return view('admin.data_siswa_tambah', compact('idSiswa', 'title', 'role'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'id_siswa' => 'required|integer',
            'nama_siswa' => 'required|string|max:50',
            'penghasilan' => 'required|string',
            'jarak' => 'required|string|max:20',
            'tanggungan' => 'required|integer',
            'pendidikan' => 'required|string',
            'rata_nilai' => 'required|integer',
            'kehadiran' => 'required|integer',
            'nis' => 'required|string|max:50',
            'nama_ayah' => 'required|string|max:50',
            'nama_ibu' => 'required|string|max:50',
            'pekerjaan_ayah' => 'required|string|max:50',
            'pekerjaan_ibu' => 'required|string|max:50',
            'alamat' => 'required|string|max:100',
        ]);

        // Simpan data ke database
        DataSiswa::create([
            'id_siswa' => $request->id_siswa,
            'nama_siswa' => $request->nama_siswa,
            'penghasilan' => $request->penghasilan,
            'jarak' => $request->jarak,
            'tanggungan' => $request->tanggungan,
            'pendidikan' => $request->pendidikan,
            'rata_nilai' => $request->rata_nilai,
            'kehadiran' => $request->kehadiran,
            'nis' => $request->nis,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'alamat' => $request->alamat,
        ]);

        // Redirect ke halaman daftar siswa dengan pesan sukses
        return redirect()->route('admin.data-siswa')->with('insert_success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit($id) 
    {
        $dataSiswa = DataSiswa::findOrFail($id);

        $title = 'Edit Data Siswa';
        $role = 'admin';

        return view('admin.data_siswa_edit', compact('dataSiswa', 'title', 'role'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama_siswa' => 'required|string|max:50',
            'penghasilan' => 'required|string',
            'jarak' => 'required|string|max:20',
            'tanggungan' => 'required|integer',
            'pendidikan' => 'required|string',
            'rata_nilai' => 'required|integer',
            'kehadiran' => 'required|integer',
            'nis' => 'required|string|max:50',
            'nama_ayah' => 'required|string|max:50',
            'nama_ibu' => 'required|string|max:50',
            'pekerjaan_ayah' => 'required|string|max:50',
            'pekerjaan_ibu' => 'required|string|max:50',
            'alamat' => 'required|string|max:100',
        ]);

        // Temukan data siswa berdasarkan ID
        $dataSiswa = DataSiswa::findOrFail($id);

        // Update data ke database
        $dataSiswa->update([
            'nama_siswa' => $request->nama_siswa,
            'penghasilan' => $request->penghasilan,
            'jarak' => $request->jarak,
            'tanggungan' => $request->tanggungan,
            'pendidikan' => $request->pendidikan,
            'rata_nilai' => $request->rata_nilai,
            'kehadiran' => $request->kehadiran,
            'nis' => $request->nis,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'alamat' => $request->alamat,
        ]);

        // Redirect ke halaman daftar siswa dengan pesan sukses
        return redirect()->route('admin.data-siswa')->with('update_success', 'Data siswa berhasil diperbarui.');
    }

    public function adminShow($id)
    {
        // Ambil data siswa berdasarkan id
        $dataSiswa = DataSiswa::findOrFail($id);

        // Variabel tambahan
        $title = 'Detail Siswa';
        $role = 'admin'; // atau ambil dari sumber lain jika dinamis

        // Kirim data ke view
        return view('admin.data_siswa_detail', compact('dataSiswa', 'title', 'role'));
    }

    public function userShow($id)
    {
        // Ambil data siswa berdasarkan id
        $dataSiswa = DataSiswa::findOrFail($id);

        // Variabel tambahan
        $title = 'Detail Siswa';
        $role = 'user'; // atau ambil dari sumber lain jika dinamis

        // Kirim data ke view
        return view('user.data_siswa_detail', compact('dataSiswa', 'title', 'role'));
    }

    public function destroy($id)
    {
        // Cari siswa berdasarkan ID
        $siswa = DataSiswa::find($id);

        // Jika siswa ditemukan, hapus
        if ($siswa) {
            $siswa->delete();
            return redirect()->route('admin.data-siswa')->with('delete_success', 'Data siswa berhasil dihapus.');
        }

        // Jika siswa tidak ditemukan, kembalikan dengan pesan error
        return redirect()->route('admin.data-siswa')->with('delete_error', 'Data siswa tidak ditemukan.');
    }
}
