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
    public function index()
    {
        $quiz = Quiz::has('relasi')->get();

        return view('quiz.index', compact('quiz'));
    }

    public function create($jumlahSoal)
    {
        return view('quiz.create', compact('jumlahSoal'));
    }

    public function store(Request $request ,$jumlahSoal)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'input.*.question' => 'required',
            'input.*.answer_a' => 'required',
            'input.*.answer_b' => 'required',
            'input.*.answer_c' => 'required',
            'input.*.answer_d' => 'required',
        ]);

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
                if ($jumlahSoal == 5 ) {
                    $questions->score = '20';
                } else if ($jumlahSoal == 10 ) {
                    $questions->score = '10';
                } else if ($jumlahSoal == 20 ) {
                    $questions->score = '5';
                } else if ($jumlahSoal == 25 ) {
                    $questions->score = '4';
                } else if ($jumlahSoal == 50 ) {
                    $questions->score = '2';
                } else {
                    $questions->score = '1';
                }
                $questions->save();
            }

        return redirect('quiz');
    }

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

    public function destroy($id)
    {
        //
    }
}
