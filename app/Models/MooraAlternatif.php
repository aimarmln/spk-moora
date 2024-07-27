<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MooraAlternatif extends Model
{
    use HasFactory;

    protected $table = 'moora_alternatif';
    protected $primaryKey = 'id_alternatif';
    public $timestamps = true;

    protected $fillable = [
        'id_siswa',
        'alternatif',
        'jarak',
        'rata_nilai',
        'penghasilan',
        'tanggungan',
        'kehadiran',
        'pendidikan',
    ];

    // Define the relationship with DataSiswa
    public function siswa()
    {
        return $this->belongsTo(DataSiswa::class, 'id_siswa', 'id_siswa');
    }
}
