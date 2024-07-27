<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaTanggungan extends Model
{
    use HasFactory;

    protected $table = 'kriteria_tanggungan';
    protected $primaryKey = 'id_tanggungan';
    public $timestamps = true;

    protected $fillable = [
        'tanggungan',
        'nilai',
    ];
}
