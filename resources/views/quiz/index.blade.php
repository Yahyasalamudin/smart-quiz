@extends('layouts.app')

@section('title', 'Quiz')

@section('content')
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sm">
                <i class="fas fa-plus"></i> Tambah Quiz
            </button>
        </div>
        {{-- Modal --}}
        <div class="modal fade" id="modal-sm">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Small Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body row justify-content-between">
                        <a class="btn btn-primary mb-2" href="{{ route('quiz.create', 5) }}" style="width: 90px">5 Soal</a>
                        <a class="btn btn-primary mb-2" href="{{ route('quiz.create', 10) }}" style="width: 90px">10
                            Soal</a>
                        <a class="btn btn-primary mb-2" href="{{ route('quiz.create', 20) }}" style="width: 90px">20
                            Soal</a>
                        <a class="btn btn-primary mb-2" href="{{ route('quiz.create', 25) }}" style="width: 90px">25
                            Soal</a>
                        <a class="btn btn-primary mb-2" href="{{ route('quiz.create', 50) }}" style="width: 90px">50
                            Soal</a>
                        <a class="btn btn-primary mb-2" href="{{ route('quiz.create', 100) }}" style="width: 90px">100
                            Soal</a>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Modal --}}
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quiz as $qu)
                        <tr>
                            <td>{{ $qu->title }}</td>
                            <td>TEST</td>
                            <td>4</td>
                            <td><a href="{{ route('addClass', $qu->id_quiz) }}">Tambah ke kelas</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min') }}.js"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(function() {
            $("#example1")
                .DataTable({
                    responsive: true,
                    lengthChange: false,
                    autoWidth: false,
                    buttons: ["excel", "pdf", "print", "colvis"],
                })
                .buttons()
                .container()
                .appendTo("#example1_wrapper .col-md-6:eq(0)");
            $("#example2").DataTable({
                paging: true,
                lengthChange: false,
                searching: false,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true,
            });
        });
    </script>
@endsection
