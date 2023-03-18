@extends('layouts.app')

@section('title', 'Add To Class')

@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Custom Elements</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('addToClass', $quiz->id_quiz) }}">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            @foreach ($kelas as $k)
                                <div class="custom-control custom-checkbox">
                                    <input
                                        class="custom-control-input custom-control-input-primary custom-control-input-outline"
                                        type="checkbox" name="kelas[]" id="kelas-{{ $k->id_kelas }}"
                                        value="{{ $k->id_kelas }}"
                                        @foreach ($soalkelas as $sk)
                                            {{ $sk->id_quiz == $quiz->id_quiz && $sk->id_kelas == $k->id_kelas ? 'checked' : '' }} @endforeach>
                                    <label for="kelas-{{ $k->id_kelas }}" class="custom-control-label">{{ $k->kelas }}
                                        {{ $k->jurusan }} {{ $k->mata_pelajaran }}</label>
                                </div>
                            @endforeach
                            {{-- {{ $idquiz }}
                            {{ $idkelas }} --}}
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection
