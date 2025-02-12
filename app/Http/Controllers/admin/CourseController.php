<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    //
    public function index()
    {

        $role = Auth::user()->role ?? 'guest';

        if ($role == 'admin') {
            $courses = Course::with('dosen')->get();
            $dosens = User::where('role', 'dosen')->get();
            // return view('admin.courses.index'); // Menampilkan view di folder admin
            return view('pages.admin.course.course', compact('courses', 'dosens'));
        } elseif ($role == 'dosen') {
            $dosen = auth()->user(); // Ambil data dosen yang login
            $courses = Course::where('dosen_id', $dosen->id)->get();
            return view('pages.pengajar.course.index', compact('courses'));
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'dosen_id' => 'required|exists:users,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);

        $data = $request->all();

        // Cek apakah ada file gambar diunggah
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('course_images', $filename); // Simpan ke storage
            $data['image'] = 'course_images/' . $filename; // Simpan path ke database
        }

        Course::create($data);

        return redirect()->route('courses')->with('success', 'Course berhasil ditambahkan!');
    }


    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'dosen_id' => 'required|exists:users,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $course->title = $request->title;
        $course->description = $request->description;
        $course->dosen_id = $request->dosen_id;

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($course->image && Storage::exists($course->image)) {
                Storage::delete($course->image);
            }

            // Simpan gambar baru
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/course_images', $filename); // Simpan ke storage dengan prefix "public/"

            $course->image = 'course_images/' . $filename; // Simpan path ke database tanpa "public/"
        }

        $course->save();

        return redirect()->back()->with('success', 'Course berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($course->image && Storage::exists($course->image)) {
            Storage::delete($course->image);
        }

        // Hapus course dari database
        $course->delete();

        return redirect()->back()->with('success', 'Course berhasil dihapus.');
    }
}
