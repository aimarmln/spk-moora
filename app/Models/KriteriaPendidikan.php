<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaPendidikan extends Model
{
    use HasFactory;

    protected $table = 'kriteria_pendidikan';
    protected $primaryKey = 'id_pendidikan';
    public $timestamps = true;

    protected $fillable = [
        'pendidikan',
        'nilai',
    ];
}
