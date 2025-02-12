<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilStudentsController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user(); // Ambil data user yang sedang login
        return view('pages.pelajar.profil.index', compact('user'));
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
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        // Cek apakah password lama sesuai
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama salah']);
        }

        // Update password baru
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->back()->with('success', 'Password berhasil diperbarui!');
    }
}
