<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('quiz.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quiz = new Quiz();
        $quiz->title = $request->input('title');
        $quiz->description = $request->input('description');
        $quiz->id_guru = auth()->user()->id;
        $quiz->save();

        foreach($request->input as $i) {
            $questions = new Question();
            $questions->id_quiz = $quiz->id;
            $questions->question = $i['question'];
            $questions->answer_a = $i['answer_a'];
            $questions->answer_b = $i['answer_b'];
            $questions->answer_c = $i['answer_c'];
            $questions->answer_d = $i['answer_d'];
            $questions->answer_e = $i['answer_e'];
            $questions->correct_answer = $i['correct_answer'];
            $questions->save();
        }

        return redirect('quiz');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
