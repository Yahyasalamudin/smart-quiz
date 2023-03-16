@extends('layouts.app')

@section('title', 'Question Create')

@section('content')
    <div class="card card-default">
        <div class="card-body p-0">
            <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                    <div class="step" data-target="#logins-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="logins-part"
                            id="logins-part-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">Quiz</span>
                        </button>
                    </div>
                    <div class="step" data-target="#information-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="information-part"
                            id="information-part-trigger">
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label">Question</span>
                        </button>
                    </div>
                </div>
                <div class="bs-stepper-content">
                    <form action="{{ route('quiz.store') }}" method="post">
                        @csrf
                        <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                            <div class="form-group">
                                <label for="title">Quiz Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    placeholder="Enter title">
                            </div>
                            <div class="form-group">
                                <label for="description">Description Quiz</label>
                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter Description"></textarea>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                        </div>
                        @php
                            $question = 0;
                            $a = 0;
                            $b = 0;
                            $c = 0;
                            $d = 0;
                            $e = 0;
                            $ca = 0;
                            $cb = 0;
                            $cc = 0;
                            $cd = 0;
                            $ce = 0;
                        @endphp
                        <div id="information-part" class="content" role="tabpanel"
                            aria-labelledby="information-part-trigger">
                            <div id="question-form">
                                <div class="form-group">
                                    <label for="question">Question <b>1</b></label>
                                    <textarea class="form-control col-lg-6" name="input[{{ $question }}][question]" id="question" rows="3"
                                        placeholder="Enter Question..."></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><input type="radio"
                                                    name="input[{{ $ca }}][correct_answer]"
                                                    value="answer_a"></span>
                                        </div>
                                        <input type="text" class="form-control col-lg-5"
                                            name="input[{{ $a }}][answer_a]" id="answer_a"
                                            placeholder="Answer A...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><input type="radio"
                                                    name="input[{{ $cb }}][correct_answer]"
                                                    value="answer_b"></span>
                                        </div>
                                        <input type="text" class="form-control col-lg-5"
                                            name="input[{{ $b }}][answer_b]" id="answer_b"
                                            placeholder="Answer B...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><input type="radio"
                                                    name="input[{{ $cc }}][correct_answer]"
                                                    value="answer_c"></span>
                                        </div>
                                        <input type="text" class="form-control col-lg-5"
                                            name="input[{{ $c }}][answer_c]" id="answer_c"
                                            placeholder="Answer C...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><input type="radio"
                                                    name="input[{{ $cd }}][correct_answer]" value="answer_d"
                                                    id="answer_d"></span>
                                        </div>
                                        <input type="text" class="form-control col-lg-5"
                                            name="input[{{ $d }}][answer_d]" placeholder="Answer D...">
                                    </div>
                                </div>
                                <div class="form-group mb-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><input type="radio"
                                                    name="input[{{ $ce }}][correct_answer]"
                                                    value="answer_e"></span>
                                        </div>
                                        <input type="text" class="form-control col-lg-5"
                                            name="input[{{ $e }}][answer_e]" id="answer_e"
                                            placeholder="Answer E...">
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-primary" id="add-input" style="float: right;">Add
                                Question</button>
                        </div>
                        {{-- name="input[{{ $count }}][answer_]" --}}
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- BS Stepper -->
    <script src="{{ asset('plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        });

        $(document).ready(function() {
            var count = 1;
            var cq = 0;
            var maxInput = 50;
            var inputCount = 1;

            // Menangkap klik pada button
            $('#add-input').click(function() {
                if (inputCount < maxInput) {
                    var newInput = $(
                        '<div class="form-group"> <label for="question">Question <b>' + (count + 1) +
                        '</b></label> <textarea class="form-control col-lg-6" name="input[' + (cq + 1) +
                        '][question]" id="question" rows="3" placeholder="Enter Question..."></textarea> </div> <div class="form-group"> <div class="input-group mb-3"> <div class="input-group-prepend"> <span class="input-group-text"><input type="radio" name="input[' +
                        (cq +
                            1) +
                        '][correct_answer]" value="answer_a"></span> </div> <input type="text" class="form-control col-lg-5" name="input[' +
                        (cq + 1) +
                        '][answer_a]" id="answer_a" placeholder="Answer A..."> </div> </div> <div class="form-group"> <div class="input-group mb-3"> <div class="input-group-prepend"> <span class="input-group-text"><input type="radio" name="input[' +
                        (cq + 1) +
                        '][correct_answer]" value="answer_b"></span> </div> <input type="text" class="form-control col-lg-5" name="input[' +
                        (cq + 1) +
                        '][answer_b]" id="answer_b" placeholder="Answer B..."> </div> </div> <div class="form-group"> <div class="input-group mb-3"> <div class="input-group-prepend"> <span class="input-group-text"><input type="radio" name="input[' +
                        (cq + 1) +
                        '][correct_answer]" value="answer_c"></span> </div> <input type="text" class="form-control col-lg-5" name="input[' +
                        (cq + 1) +
                        '][answer_c]" id="answer_c" placeholder="Answer C..."> </div> </div> <div class="form-group"> <div class="input-group mb-3"> <div class="input-group-prepend"> <span class="input-group-text"><input type="radio" name="input[' +
                        (cq + 1) +
                        '][correct_answer]" value="answer_d" id="answer_d"></span> </div> <input type="text" class="form-control col-lg-5" name="input[' +
                        (cq + 1) +
                        '][answer_d]" placeholder="Answer D..."> </div> </div> <div class="form-group mb-5"> <div class="input-group mb-3"> <div class="input-group-prepend"> <span class="input-group-text"><input type="radio" name="input[' +
                        (cq + 1) +
                        '][correct_answer]" value="answer_e"></span> </div> <input type="text" class="form-control col-lg-5" name="input[' +
                        (cq + 1) + '][answer_e]" id="answer_e" placeholder="Answer E..."> </div> </div>'
                    );

                    // Menambahkan elemen input baru ke dalam container
                    $('#question-form').append(newInput);

                    // Menambahkan 1 ke nomer input
                    inputCount++;
                    cq++;
                    count++;
                }
            });
        });
    </script>
@endsection
