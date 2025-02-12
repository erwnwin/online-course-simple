@extends('template.admin.admin')

@section('title', 'Daftar Materi : Online Courses')

@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Daftar Materi untuk Kursus: {{ $course->title }}
            </h1>
            <small>Berikut adalah daftar materi untuk courses</small>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Data Courses</h3>

                            <div class="box-tools">
                                <a href="{{ route('pengajar.course.materials.create', $course->id) }}"
                                    class="btn btn-success btn-sm">
                                    <i class="fa fa-plus"></i> Tambah Materi
                                </a>

                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Materi</th>
                                        <th>File</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($course->materis->isEmpty())
                                        <tr>
                                            <td colspan="9" class="text-center">
                                                <img src="{{ asset('assets/no-data.svg') }}" alt="No Data"
                                                    style="width: 150px; height: auto; margin-top:40px">
                                                <p>No Data Available</p>
                                                <!-- Opsional: untuk memberikan konteks lebih lanjut -->
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($course->materis as $index => $materi)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $materi->title }}</td>
                                                <td><a href="{{ asset('storage/' . $materi->file_path) }}"
                                                        target="_blank">Lihat File</a></td>
                                                <td>
                                                    <form
                                                        action="{{ route('pengajar.course.materials.destroy', $course->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Yakin ingin menghapus semua materi?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i> Hapus Semua Materi
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>





@endsection
