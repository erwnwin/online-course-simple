<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MateriView extends Model
{
    //
    use HasFactory;

    protected $fillable = ['materi_id', 'mahasiswa_id', 'view_count'];

    /**
     * Relasi ke Materi.
     */
    public function materi()
    {
        return $this->belongsTo(Materi::class, 'materi_id');
    }

    /**
     * Relasi ke Mahasiswa.
     */
    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }
}
