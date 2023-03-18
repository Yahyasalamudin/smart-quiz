<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_kelas';
    protected $fillable = [
        'id_guru',
        'mata_pelajaran',
        'kelas',
        'jurusan',
        'tentang_pelajaran'
    ];

    public function quiz() {
        return $this->belongsToMany(Quiz::class, 'soal_kelas', 'id_kelas', 'id_quiz')->withTimestamps();
    }
}
