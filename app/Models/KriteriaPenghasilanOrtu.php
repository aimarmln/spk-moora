<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaPenghasilanOrtu extends Model
{
    use HasFactory;

    protected $table = 'kriteria_penghasilan_ortu';
    protected $primaryKey = 'id_penghasilan';
    public $timestamps = true;

    protected $fillable = [
        'penghasilan',
        'nilai',
    ];
}
