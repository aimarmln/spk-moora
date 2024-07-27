<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaJarak extends Model
{
    use HasFactory;

    protected $table = 'kriteria_jarak';
    protected $primaryKey = 'id_jarak';
    public $timestamps = true;

    protected $fillable = [
        'jarak',
        'nilai',
    ];
}
