<?php

namespace App\Http\Controllers;

use App\Models\AdminAcc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login_admin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = AdminAcc::where('username', $request->username)->first();

        if ($admin && (Hash::check($request->password, $admin->password))) {
            session(['admin_username' => $admin->username]);
            return redirect()->route('admin.dashboard');
        } else {
            return back()->withErrors(['login_error' => 'Username atau Password salah']);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin_username');
        return redirect()->route('login-admin');
    }
}
