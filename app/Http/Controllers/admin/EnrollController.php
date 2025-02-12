<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EnrollController extends Controller
{
    //
    public function index()
    {
        // $enrollments = Enrollment::with(['course', 'mahasiswa'])->get();
        $enrollments = Enrollment::with('course', 'mahasiswa')
            ->get()
            ->groupBy('mahasiswa_id');
        return view('pages.admin.enroll.index', compact('enrollments'));
    }

    public function create()
    {
        $courses = Course::all();
        $mahasiswa = User::where('role', 'mahasiswa')->get(); // Ambil mahasiswa saja

        return view('pages.admin.enroll.create', compact('courses', 'mahasiswa'));
    }

    // Menyimpan enroll mahasiswa ke dalam course
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'mahasiswa_ids' => 'required|array',
            'mahasiswa_ids.*' => 'exists:users,id',
        ]);

        foreach ($request->mahasiswa_ids as $mahasiswa_id) {
            Enrollment::firstOrCreate([
                'course_id' => $request->course_id,
                'mahasiswa_id' => $mahasiswa_id,
            ]);
        }

        return redirect()->route('enroll')->with('success', 'Mahasiswa berhasil di-enroll ke course!');
    }


    public function destroy($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->delete();

        return redirect()->back()->with('canceled', 'Enroll berhasil dibatalkan.');
    }
}
