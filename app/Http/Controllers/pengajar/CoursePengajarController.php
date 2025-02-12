<?php

namespace App\Http\Controllers\pengajar;

use App\Models\Course;
use App\Models\Materi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoursePengajarController extends Controller
{
    //

    public function index($course_id)
    {
        // Ambil data kursus berdasarkan ID
        $course = Course::with('materis')->findOrFail($course_id);

        return view('pages.pengajar.materials.index', compact('course'));
    }


    public function store(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|mimes:pdf,doc,docx,ppt,pptx,zip,rar|max:2048', // Maks 2MB
        ]);

        // Simpan file
        $filePath = $request->file('file')->store('materi', 'public');

        // Simpan materi ke database
        Materi::create([
            'title' => $request->title,
            'file_path' => $filePath,
            'course_id' => $course->id,
            'dosen_id' => auth()->user()->id,
        ]);

        return redirect()->route('courses.pengajar')->with('success', 'Materi berhasil ditambahkan!');
    }


    public function create(Course $course)
    {
        return view('pages.pengajar.materials.create', compact('course'));
    }


    public function destroy($course_id)
    {
        // Hapus semua materi berdasarkan course_id
        Materi::where('course_id', $course_id)->delete();

        return redirect()->route('pengajar.course.materials.index', $course_id)
            ->with('success', 'Semua materi telah dihapus.');
    }
}
