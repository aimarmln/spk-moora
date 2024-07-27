<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaKehadiran extends Model
{
    use HasFactory;

    protected $table = 'kriteria_kehadiran';
    protected $primaryKey = 'id_kehadiran';
    public $timestamps = true;

    protected $fillable = [
        'kehadiran',
        'nilai',
    ];
}
