<?php

namespace App\Http\Controllers\pelajar;

use App\Models\Course;
use App\Models\Materi;
use App\Models\MateriView;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PelajarMateriController extends Controller
{
    //

    public function enrolledCourses()
    {
        $mahasiswa_id = Auth::id();

        // Ambil hanya course yang telah dienroll oleh mahasiswa
        $courses = Course::whereHas('enrolledStudents', function ($query) use ($mahasiswa_id) {
            $query->where('mahasiswa_id', $mahasiswa_id);
        })->get();

        return view('pages.pelajar.courses.index', compact('courses'));
    }


    public function index($course_id)
    {
        $course = Course::with('materis')->findOrFail($course_id);

        return view('pages.pelajar.materials.index', compact('course'));
    }

    /**
     * Menampilkan materi tertentu dan mencatat bahwa mahasiswa telah melihat materi tersebut.
     */
    public function show($course_id, $materi_id)
    {
        $materi = Materi::where('course_id', $course_id)->findOrFail($materi_id);
        $mahasiswa_id = Auth::id();

        // Cek apakah mahasiswa sudah melihat materi ini sebelumnya
        $view = MateriView::where('materi_id', $materi->id)
            ->where('mahasiswa_id', $mahasiswa_id)
            ->first();

        if ($view) {
            // Jika sudah melihat, tambahkan jumlah view
            $view->increment('view_count');
        } else {
            // Jika belum, buat record baru
            MateriView::create([
                'materi_id' => $materi->id,
                'mahasiswa_id' => $mahasiswa_id,
                'view_count' => 1
            ]);
        }

        return view('pages.pelajar.materials.show', compact('materi', 'view'));
    }
}
