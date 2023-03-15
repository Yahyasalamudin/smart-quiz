@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <form action="{{ route('quiz.store') }}" method="post">
            @csrf
            <div class="card-body" id="card-group">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="title">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="description" cols="50" rows="5"></textarea>
                </div>
                <div class="input-group mt-3 mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><input type="radio" name="correct_answer" value="answer_1"></span>
                    </div>
                    <input type="text" class="form-control" name="answer_1">
                </div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-primary" id="add-input">Add answer</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>

    <script>
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
    </script>
@endsection
