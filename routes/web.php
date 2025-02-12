<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\DosenController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\EnrollController;
use App\Http\Controllers\ProfilTeacherController;
use App\Http\Controllers\admin\StudentsController;
use App\Http\Controllers\ProfilStudentsController;
use App\Http\Controllers\pelajar\PelajarMateriController;
use App\Http\Controllers\pengajar\CoursePengajarController;
use App\Http\Controllers\pelajar\DashboardStudentsController;
use App\Http\Controllers\pengajar\DashboardTeacherController;
use App\Http\Controllers\ProfilController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kursus', [KursusController::class, 'index'])->name('kursus');

Route::get('/auth/login', [LoginController::class, 'index'])->name('login');
Route::post('/act/log', [LoginController::class, 'login'])->name('login.act');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
    Route::put('/profil/update', [ProfilController::class, 'update'])->name('profil.update');
    Route::put('/profil/update-password', [ProfilController::class, 'updatePassword'])->name('profil.updatePassword');

    Route::get('/courses', [CourseController::class, 'index'])->name('courses');
    Route::post('/courses/store', [CourseController::class, 'store'])->name('courses.store');
    Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');


    Route::get('/teachers', [DosenController::class, 'index'])->name('teachers');
    Route::post('/teachers/store', [DosenController::class, 'store'])->name('teachers.store');

    Route::get('/students', [StudentsController::class, 'index'])->name('students');

    Route::get('/enroll', [EnrollController::class, 'index'])->name('enroll');
    Route::get('/enroll/create', [EnrollController::class, 'create'])->name('enroll.create');
    Route::post('/enroll', [EnrollController::class, 'store'])->name('enroll.store');
    Route::delete('/enroll/{id}', [EnrollController::class, 'destroy'])->name('enroll.destroy');
});

Route::middleware('auth', 'role:dosen')->prefix('pengajar')->group(function () {
    Route::get('/dashboard', [DashboardTeacherController::class, 'index'])->name('dashboard.pengajar');
    Route::get('/profil', [ProfilTeacherController::class, 'index'])->name('profil.pengajar');
    Route::put('/profil/update', [ProfilTeacherController::class, 'update'])->name('profil.pengajar.update');
    Route::put('/profil/update-password', [ProfilTeacherController::class, 'updatePassword'])->name('profil.pengajar.updatePassword');

    Route::get('/courses', [CourseController::class, 'index'])->name('courses.pengajar');
    Route::get('/courses/{course}/materials', [CoursePengajarController::class, 'create'])->name('pengajar.course.materials.create');
    Route::post('/courses/{course}/materials', [CoursePengajarController::class, 'store'])->name('pengajar.course.materials.store');
    Route::get('/courses/{course}/show-materials', [CoursePengajarController::class, 'index'])->name('pengajar.course.materials.index');
    Route::delete('/courses/delete/materials/{id}', [CoursePengajarController::class, 'destroy'])->name('pengajar.course.materials.destroy');
});


Route::middleware('auth', 'role:mahasiswa')->prefix('students')->group(function () {
    Route::get('/dashboard', [DashboardStudentsController::class, 'index'])->name('dashboard.pelajar');
    Route::get('/profil', [ProfilStudentsController::class, 'index'])->name('profil.pelajar');
    Route::get('/courses', [PelajarMateriController::class, 'enrolledCourses'])->name('pelajar.courses');
    Route::get('/courses/{course_id}/materials', [PelajarMateriController::class, 'index'])->name('pelajar.course.materials');
    Route::get('/courses/{course_id}/materials/{materi_id}', [PelajarMateriController::class, 'show'])->name('pelajar.course.materials.show');
});

Route::get('/logout', function (Request $request) {
    Auth::logout(); // Logout pengguna
    $request->session()->invalidate(); // Hapus session
    $request->session()->regenerateToken(); // Regenerasi token CSRF

    return redirect('/auth/login'); // Redirect ke halaman login
})->name('logout');
