<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilTeacherController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user(); // Ambil data user yang sedang login
        return view('pages.pengajar.profil.index', compact('user'));
    }

    // Update data profil
    public function update(Request $request)
    {
        $user = Auth::user(); // Ambil user yang sedang login

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }

    // Update password
    public function updatePassword(Request $request)
    {
        $user = Auth::user(); // Ambil user yang sedang login

        $request->validate([
            'new_password' => 'required|min:6|confirmed',
        ]);

        // Update password baru tanpa cek password lama
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->back()->with('success', 'Password berhasil diperbarui!');
    }
}
