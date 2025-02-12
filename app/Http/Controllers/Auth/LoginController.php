<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('template.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('dashboard');
            } elseif ($user->role === 'dosen') {
                return redirect()->route('dashboard.pengajar');
            } elseif ($user->role === 'mahasiswa') {
                return redirect()->route('dashboard.pelajar');
            }
        }

        return back()->withErrors(['email' => 'Email atau password salah!']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda telah logout!');
    }
}
