<?php

namespace App\Http\Controllers\pelajar;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardStudentsController extends Controller
{
    //
    public function index()
    {
        $mahasiswa = Auth::user(); // Ambil data mahasiswa yang sedang login
        $jumlahKursus = Enrollment::where('mahasiswa_id', $mahasiswa->id)->count();
        return view('pages.pelajar.dashboard', compact('mahasiswa', 'jumlahKursus'));
    }
}
