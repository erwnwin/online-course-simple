<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $admin = Auth::user();

        $jumlah_course = Course::count();
        $jumlah_mahasiswa = User::where('role', 'mahasiswa')->count();
        $jumlah_dosen = User::where('role', 'dosen')->count();
        $jumlah_enrollment = Enrollment::count();

        // return view('admin.dashboard', compact('jumlah_course', 'jumlah_mahasiswa', 'jumlah_dosen', 'jumlah_enrollment'));

        return view('pages.admin.dashboard', compact('admin', 'jumlah_course', 'jumlah_mahasiswa', 'jumlah_dosen', 'jumlah_enrollment'));
    }
}
