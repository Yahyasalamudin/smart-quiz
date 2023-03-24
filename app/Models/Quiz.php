<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $primaryKey="id_quiz";

    protected $fillable = ['title', 'description', 'id_guru'];


    public function kelas() {
        return $this->belongsToMany(Kelas::class, 'soal_kelas', 'id_quiz', 'id_kelas')->withTimestamps();
    }

    public function relasi() {
        return $this->hasMany(Question::class, 'id_quiz', 'id_quiz');
    }
}
