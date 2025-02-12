<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class KursusController extends Controller
{
    //
    public function index()
    {
        $courses = Course::with('dosen')->get();
        return view('pages.kursus.index', compact('courses'));
    }
}
