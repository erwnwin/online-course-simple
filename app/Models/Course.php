<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = ['title', 'description', 'dosen_id', 'image'];

    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function materis()
    {
        return $this->hasMany(Materi::class, 'course_id');
    }

    public function enrolledStudents()
    {
        return $this->belongsToMany(User::class, 'enrollments', 'course_id', 'mahasiswa_id');
    }
}
