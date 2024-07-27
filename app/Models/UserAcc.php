<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAcc extends Model
{
    use HasFactory;

    protected $table = 'user_acc';
    protected $primaryKey = 'id_user';
    public $timestamps = true;

    protected $fillable = [
        'id_user',
        'nama_user',
        'username',
        'password',
        'level',
    ];
}
