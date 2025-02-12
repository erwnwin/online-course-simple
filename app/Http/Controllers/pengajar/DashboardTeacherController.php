<?php

namespace App\Http\Controllers\pengajar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardTeacherController extends Controller
{
    //
    public function index()
    {
        $dosen = Auth::user();
        return view('pages.pengajar.dashboard', compact('dosen'));
    }
}
