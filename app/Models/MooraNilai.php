<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MooraNilai extends Model
{
    use HasFactory;

    protected $table = 'moora_nilai';
    protected $primaryKey = 'id_nilai';
    public $timestamps = true;

    protected $fillable = [
        'id_alternatif',
        'id_kriteria',
        'nilai',
    ];

    // Optional: Define relationships if needed
    // public function alternatif()
    // {
    //     return $this->belongsTo(MooAlternatif::class, 'id_alternatif');
    // }

    // public function kriteria()
    // {
    //     return $this->belongsTo(MooKriteria::class, 'id_kriteria');
    // }
}
