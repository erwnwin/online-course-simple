<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentsController extends Controller
{
    //
    public function index()
    {
        $students = User::where('role', 'mahasiswa')->get();
        return view('pages.admin.mahasiswa.index', compact('students'));
    }
}
