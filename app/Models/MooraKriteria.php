<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MooraKriteria extends Model
{
    use HasFactory;

    protected $table = 'moora_kriteria';
    protected $primaryKey = 'id_kriteria';
    public $timestamps = true;

    protected $fillable = [
        'kode',
        'kriteria',
        'type',
        'bobot',
    ];
}
