<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function view_login()
    {
        return view('pages.login');
    }

    public function process_login(Request $request)
    {
        //Validate Username And Password
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        //Check Username And Password
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('rks.dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau password anda salah',
            'password' => 'Password atau username anda salah',
        ]);
    }

    public function view_dashboard()
    {
        return view('pages.dashboard');
    }

    public function process_logout(Request $request)
    {
        //Logout Process
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('rks.login');
    }
}
