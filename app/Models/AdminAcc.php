<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminAcc extends Model
{
    use HasFactory;

    protected $table = 'admin_acc';
    protected $primaryKey = 'id_admin';
    public $timestamps = true;

    protected $fillable = [
        'id_admin',
        'nama_admin',
        'username',
        'password',
        'level',
    ]; 

    protected $hidden = [
        'password',
    ];
}
