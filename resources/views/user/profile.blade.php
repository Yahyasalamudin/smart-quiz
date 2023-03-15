@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="row justify-content-center">
                        <div class="pic-holder">
                            <img class="pic img-circle" src="{{ url('storage/profile/' . $user->profile) }}" alt=""
                                style="height:128px; width:128px">
                        </div>
                    </div>

                    <h3 class="profile-username text-center">{{ $user->nama }}</h3>

                    <p class="text-muted text-center">{{ $user->level }}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Followers</b> <a class="float-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                            <b>Following</b> <a class="float-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Friends</b> <a class="float-right">13,287</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="#editprofile" data-toggle="tab">Edit Profile</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="profile">
                            <div class="post">
                                <div class="card-body">
                                    <strong><i class="fas fa-user mr-1"></i> Nama</strong>

                                    <p class="text-muted">
                                        {{ $user->nama }}
                                    </p>

                                    <hr>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Tempat, Tanggal Lahir</strong>

                                    <p class="text-muted">
                                        {{ $user->tempat_lahir }}, {{ date('d-F-Y', strtotime($user->tanggal_lahir)) }}</p>

                                    <hr>

                                    <strong><i class="fas fa-venus-mars"></i> Jenis Kelamin</strong>

                                    <p class="text-muted">
                                        {{ $user->jenis_kelamin }}
                                    </p>

                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                                        fermentum enim
                                        neque.</p>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="editprofile">
                            <form class="form-horizontal" action="{{ route('editProfile', $user->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- <div class="form-group row justify-content-center">
                                    <div class="col-sm-3">
                                        <label for="file-profile">
                                            <img class="profile-user-img img-fluid img-circle img-profile" id="preview"
                                                src="{{ url('storage/profile/' . $user->profile) }}" alt="Profile">
                                        </label>
                                    </div>
                                </div> --}}

                                <div class="form-group row justify-content-center">
                                    <div class="pic-holder row justify-content-center">
                                        <img class="pic img-circle" id="preview"
                                            src="{{ url('storage/profile/' . $user->profile) }}" alt="Profile">
                                        <input class="uploadProfileInput" type="file" name="profile" id="file-profile"
                                            style="opacity: 0;" onchange="readURL(this);">
                                        <label for="file-profile" class="upload-file-block rounded-circle">
                                            <div class="text-center">
                                                <div class="mb-2">
                                                    <i class="fa fa-camera fa-2x"></i>
                                                </div>
                                                <div class="text-uppercase">
                                                    Update <br /> Profile Photo
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                {{-- <input type="file" name="profile" id="file-profile" onchange="readURL(this);"
                                    style="display: none;"> --}}

                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama" id="inputName"
                                            placeholder="Name" value="{{ $user->nama }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" id="inputEmail"
                                            placeholder="Email" value="{{ $user->email }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                            placeholder="Tempat Lahir" value="{{ $user->tempat_lahir }}">
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                    </div>
                                </div> --}}
                                <div class="form-group row">
                                    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tanggal_lahir"
                                            id="tanggal_lahir" placeholder="Tanggal Lahir"
                                            value="{{ $user->tanggal_lahir }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                            @if ($user->jenis_kelamin == 'pria')
                                                <option value="pria">Pria</option>
                                                <option value="wanita">Wanita</option>
                                            @else
                                                <option value="wanita">Wanita</option>
                                                <option value="pria">Pria</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i>
                                            Edit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(function() {
            bsCustomFileInput.init();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
