<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index() {
        return view('quiz.index');
    }

    public function create() {
        return view('quiz.question-create');
    }
}
