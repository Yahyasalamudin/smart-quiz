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
                    <form action="{{ route('quiz.store', $jumlahSoal) }}" method="post">
                        @csrf
                        <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                            <div class="form-group">
                                <label for="title">Quiz Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    placeholder="Enter title" value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description Quiz</label>
                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter Description">{{ old('description') }}</textarea>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                        </div>
                        <div id="information-part" class="content" role="tabpanel"
                            aria-labelledby="information-part-trigger">
                            @php
                                $q = 1;
                                $que = 0;
                                $aa = 0;
                                $ab = 0;
                                $ac = 0;
                                $ad = 0;
                                $ae = 0;
                                $ca = 0;
                                $cb = 0;
                                $cc = 0;
                                $cd = 0;
                                $ce = 0;
                                $ca1 = 0;
                                $ca2 = 0;
                                $ca3 = 0;
                                $ca4 = 0;
                                $ca5 = 0;
                                $c1 = 0;
                                $c2 = 0;
                                $c3 = 0;
                                $c4 = 0;
                                $c5 = 0;
                            @endphp
                            @for ($i = 0; $i < $jumlahSoal; $i++)
                                <div id="question-form">
                                    <div class="form-group">
                                        <label for="question">Question <b>{{ $q++ }}</b></label>
                                        <textarea class="form-control col-lg-5" name="input[{{ $que++ }}][question]" id="question" rows="3"
                                            placeholder="Enter Question..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><input type="radio"
                                                        name="input[{{ $ca1++ }}][correct_answer]" value="answer_a"
                                                        {{ old('input.' . $c1++ . '.correct_answer') == 'answer_a' ? 'checked' : '' }}
                                                        required></span>
                                            </div>
                                            <input type="text" class="form-control col-lg-5"
                                                name="input[{{ $aa++ }}][answer_a]" id="answer_a"
                                                placeholder="Answer A..." value="{{ old('input.' . $ca++ . '.answer_a') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><input type="radio"
                                                        name="input[{{ $ca2++ }}][correct_answer]" value="answer_b"
                                                        {{ old('input.' . $c2++ . '.correct_answer') == 'answer_b' ? 'checked' : '' }}
                                                        required></span>
                                            </div>
                                            <input type="text" class="form-control col-lg-5"
                                                name="input[{{ $ab++ }}][answer_b]" id="answer_b"
                                                placeholder="Answer B..." value="{{ old('input.' . $cb++ . '.answer_b') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><input type="radio"
                                                        name="input[{{ $ca3++ }}][correct_answer]" value="answer_c"
                                                        {{ old('input.' . $c3++ . '.correct_answer') == 'answer_c' ? 'checked' : '' }}
                                                        required></span>
                                            </div>
                                            <input type="text" class="form-control col-lg-5"
                                                name="input[{{ $ac++ }}][answer_c]" id="answer_c"
                                                placeholder="Answer C..." value="{{ old('input.' . $cc++ . '.answer_c') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><input type="radio"
                                                        name="input[{{ $ca4++ }}][correct_answer]"
                                                        value="answer_d" id="answer_d"
                                                        {{ old('input.' . $c4++ . '.correct_answer') == 'answer_d' ? 'checked' : '' }}
                                                        required></span>
                                            </div>
                                            <input type="text" class="form-control col-lg-5"
                                                name="input[{{ $ad++ }}][answer_d]" placeholder="Answer D..."
                                                value="{{ old('input.' . $cd++ . '.answer_d') }}">
                                        </div>
                                    </div>
                                    <div class="form-group mb-5">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><input type="radio"
                                                        name="input[{{ $ca5++ }}][correct_answer]"
                                                        value="answer_e"
                                                        {{ old('input.' . $c5++ . '.correct_answer') == 'answer_e' ? 'checked' : '' }}
                                                        required></span>
                                            </div>
                                            <input type="text" class="form-control col-lg-5"
                                                name="input[{{ $ae++ }}][answer_e]" id="answer_e"
                                                placeholder="Answer E..."
                                                value="{{ old('input.' . $ce++ . '.answer_e') }}">
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                            <button type="submit" class="btn btn-primary"
                                style="float: right; width: 90px;">Submit</button>
                        </div>
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
    </script>
@endsection
