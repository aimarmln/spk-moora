<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use App\Models\UserAcc;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function admin() 
    {
        $numOfStudents = count(DataSiswa::all());
        $numOfTeachers = count(UserAcc::all());

        $title = "Dashboard Admin";
        $role = "admin";

        return view('admin.dashboard', compact('numOfStudents', 'numOfTeachers', 'title', 'role'));
    }

    public function user() 
    {
        $title = "Dashboard User";
        $role = "user";
        
        return view('user.dashboard', compact('title', 'role'));
    }
}
