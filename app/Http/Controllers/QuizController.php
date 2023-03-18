<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\SoalKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quiz = Quiz::all();

        return view('quiz.index', compact('quiz'));
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
            $questions->id_quiz = $quiz->id_quiz;
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
    public function addClass($id)
    {
        $quiz = Quiz::find($id);

        $kelas = Kelas::all();

        $soalkelas = DB::table('soal_kelas')->get();

        return view('quiz.add-to-class', compact('quiz', 'kelas', 'soalkelas'));
    }

    public function addToClass(Request $request, $id)
    {
        $request->validate([
            'kelas' => 'array',
            'kelas.*' => 'integer|exists:kelas,id_kelas'
        ]);

        $quiz = Quiz::findOrFail($id);
        $kelasIds = $request->input('kelas');
        $quiz->kelas()->sync($kelasIds);

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
