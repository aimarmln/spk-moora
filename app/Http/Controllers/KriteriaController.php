<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MooraKriteria;
use App\Models\KriteriaJarak;
use App\Models\KriteriaKehadiran;
use App\Models\KriteriaRataNilai;
use App\Models\KriteriaPendidikan;
use App\Models\KriteriaTanggungan;
use App\Models\KriteriaPenghasilanOrtu;

class KriteriaController extends Controller
{
    public function admin() 
    {
        // Mengambil data dari semua tabel
        $mooraKriteria = MooraKriteria::all();
        $kriteriaJarak = KriteriaJarak::all();
        $kriteriaKehadiran = KriteriaKehadiran::all();
        $kriteriaPendidikan = KriteriaPendidikan::all();
        $kriteriaPenghasilanOrtu = KriteriaPenghasilanOrtu::all();
        $kriteriaRataNilai = KriteriaRataNilai::all();
        $kriteriaTanggungan = KriteriaTanggungan::all();

        // Judul halaman
        $title = 'Data Kriteria';
        // Role
        $role = 'admin';

        // Mengirim semua data ke view
        return view('admin.data_kriteria', compact(
            'mooraKriteria',
            'kriteriaJarak',
            'kriteriaKehadiran',
            'kriteriaPendidikan',
            'kriteriaPenghasilanOrtu',
            'kriteriaRataNilai',
            'kriteriaTanggungan',
            'title',
            'role',
        ));
    }

    public function user() 
    {
        // Mengambil data dari semua tabel
        $mooraKriteria = MooraKriteria::all();
        $kriteriaJarak = KriteriaJarak::all();
        $kriteriaKehadiran = KriteriaKehadiran::all();
        $kriteriaPendidikan = KriteriaPendidikan::all();
        $kriteriaPenghasilanOrtu = KriteriaPenghasilanOrtu::all();
        $kriteriaRataNilai = KriteriaRataNilai::all();
        $kriteriaTanggungan = KriteriaTanggungan::all();

        // Judul halaman
        $title = 'Data Kriteria';
        // Role
        $role = 'user';

        // Mengirim semua data ke view
        return view('user.data_kriteria', compact(
            'mooraKriteria',
            'kriteriaJarak',
            'kriteriaKehadiran',
            'kriteriaPendidikan',
            'kriteriaPenghasilanOrtu',
            'kriteriaRataNilai',
            'kriteriaTanggungan',
            'title',
            'role',
        ));
    }
}
