@extends('layouts.app')

@section('title', 'Question Create')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <form action="{{ route('quiz.store') }}" method="post">
            @csrf
            <div class="card-body" id="card-group">
                <div class="form-group">
                    <label for="question">Question</label>
                    <input type="text" class="form-control" name="question" id="question" placeholder="Question...">
                </div>
                <div class="form-group">
                    <label for="answer_a">Answer A</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><input type="radio" name="correct_answer"
                                    value="answer_a"></span>
                        </div>
                        <input type="text" class="form-control" name="answer_a" id="answer_a" placeholder="Answer A...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="answer_a">Answer B</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><input type="radio" name="correct_answer"
                                    value="answer_b"></span>
                        </div>
                        <input type="text" class="form-control" name="answer_b" id="answer_b" placeholder="Answer B...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="answer_a">Answer B</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><input type="radio" name="correct_answer"
                                    value="answer_c"></span>
                        </div>
                        <input type="text" class="form-control" name="answer_c" id="answer_c" placeholder="Answer C...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="answer_a">Answer D</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><input type="radio" name="correct_answer" value="answer_d"
                                    id="answer_d"></span>
                        </div>
                        <input type="text" class="form-control" name="answer_d" placeholder="Answer D...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="answer_a">Answer E</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><input type="radio" name="correct_answer"
                                    value="answer_e"></span>
                        </div>
                        <input type="text" class="form-control" name="answer_e" id="answer_e" placeholder="Answer E...">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            {{-- <button type="button" class="btn btn-primary" id="add-input">Add answer</button> --}}
        </form>
    </div>

    {{-- <script>
        $(document).ready(function() {
            var count = 1;
            var maxInput = 5;
            var inputCount = 1;

            // Menangkap klik pada button
            $('#add-input').click(function() {
                if (inputCount < maxInput) {
                    var newInput = $(
                        '<div class="input-group mt-3 mb-3"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><input type="radio" name="correct_answer" value="answer_' +
                        (count + 1) +
                        '"></span> </div> <input type="text" class="form-control" name="answer_' +
                        (count + 1) + '"> </div> </div>')

                    // Menambahkan elemen input baru ke dalam container
                    $('#card-group').append(newInput);

                    // Menambahkan 1 ke nomer input
                    inputCount++;
                    count++;
                }
            });
        });
    </script> --}}
@endsection
