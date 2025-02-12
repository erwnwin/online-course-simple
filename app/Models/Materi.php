<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materi extends Model
{
    //
    use HasFactory;

    protected $fillable = ['title', 'file_path', 'course_id', 'dosen_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }


    public function views()
    {
        return $this->hasMany(MateriView::class, 'materi_id');
    }

    public function viewCountForMahasiswa($mahasiswa_id)
    {
        return $this->views()->where('mahasiswa_id', $mahasiswa_id)->first()?->view_count ?? 0;
    }
}
