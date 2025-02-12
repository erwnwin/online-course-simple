@extends('template.admin.admin')

@section('title', 'Add Materi : Online Courses')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Tambah Materi untuk {{ $course->title }}</h1>
            <small>Form Tambah Materi | Anda dapat menambahkan sesuai format yang ditentukan</small>
        </section>

        <section class="content">

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Error!</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="box box-primary">
                <div class="box-body">
                    <form action="{{ route('pengajar.course.materials.store', $course->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Judul Materi</label>
                            <input type="text" name="title" class="form-control" placeholder="Judul Materi" required>
                        </div>

                        <div class="form-group">
                            <label>File Materi (PDF, DOC, PPT, ZIP)</label>
                            <input type="file" name="file" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Materi</button>
                        <a href="/pengajar/courses" class="btn btn-danger">Kembali</a>
                    </form>

                </div>
            </div>
        </section>
    </div>
@endsection
