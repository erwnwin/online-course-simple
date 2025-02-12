<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DosenController extends Controller
{
    //
    public function index()
    {
        $dosens = User::where('role', 'dosen')->get();
        return view('pages.admin.dosen.index', compact('dosens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|string',
        ]);

        User::create($request->all());

        return redirect()->route('teachers')->with('success', 'Teachers berhasil ditambahkan!');
    }
}
