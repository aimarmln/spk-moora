<?php

namespace App\Http\Controllers;

use App\Models\UserAcc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login_user');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = UserAcc::where('username', $request->username)->first();

        if ($user && (Hash::check($request->password, $user->password))) {
            session(['user_username' => $user->username]);
            return redirect()->route('user.dashboard');
        } else {
            return back()->withErrors(['login_error' => 'Username atau Password salah']);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user_username');
        return redirect()->route('login-user');
    }
}
