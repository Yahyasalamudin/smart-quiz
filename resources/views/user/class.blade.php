@extends('layouts.app')

@section('title', 'Class')

@section('content')
    <div class="card card-solid">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                <i class="fas fa-plus"></i> Tambah Kelas
            </button>
        </div>
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Default Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('class.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="mata_pelajaran">Mata Pelajaran</label>
                                <select class="form-control" name="mata_pelajaran" id="mata_pelajaran">
                                    <option value="PWPB">PWPB</option>
                                    <option value="Basis Data">Basis Data</option>
                                    <option value="Bahasa Inggris">Bahasa Inggris</option>
                                    <option value="PBO">PBO</option>
                                    <option value="Matematika">Matematika</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <select class="form-control" name="kelas" id="kelas">
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                    <option value="XII">XII</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <select class="form-control" name="jurusan" id="jurusan">
                                    @foreach ($jurusans as $j)
                                        <option value="{{ $j->jurusan }}">{{ $j->jurusan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tentang_pelajaran">Deskripsi</label>
                                <textarea class="form-control" name="tentang_pelajaran" id="tentang_pelajaran" rows="3"
                                    placeholder="Enter Description"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Buat Kelas</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body pb-0 container">
            <div class="row">
                @foreach ($kelas as $k)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header border-bottom-0">
                                <h2 class="lead font-weight-bold"><b>{{ $k->mata_pelajaran }}</b></h2>
                                <span class="text-md">{{ $k->nama }}</span>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <p class="text-muted text-sm mb-0"><b>Kelas: </b> {{ $k->kelas }}
                                            {{ $k->jurusan }} </p>
                                        <p class="text-muted text-sm"><b>About: </b> {{ $k->tentang_pelajaran }} </p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-building"></i></span>
                                                {{ $k->email }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        {{-- <div class="pic-holder"> --}}
                                        <img src="{{ url('storage/profile/' . $k->profile) }}" alt="user-avatar"
                                            class="img-circle img-fluid" style="height:110px; width:110px">
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="#" class="btn btn-sm bg-teal">
                                        <i class="fas fa-comments"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> Masuk Kelas
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
