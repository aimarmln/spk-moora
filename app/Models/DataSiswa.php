<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSiswa extends Model
{
    use HasFactory;

    protected $table = 'data_siswa';
    protected $primaryKey = 'id_siswa';
    public $timestamps = true;

    protected $fillable = [
        'id_siswa',
        'nama_siswa',
        'penghasilan',
        'jarak',
        'tanggungan',
        'pendidikan',
        'rata_nilai',
        'kehadiran',
        'nis',
        'nama_ayah',
        'nama_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'alamat',
    ];

    // Define the relationship with MooraAlternatif
    public function alternatif()
    {
        return $this->hasMany(MooraAlternatif::class, 'id_siswa', 'id_siswa');
    }
}
