@extends('template.admin.admin')

@section('title', 'Courses : Online Courses')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data Courses
            </h1>
            <small>Berikut adalah daftar Courses</small>
        </section>

        <!-- Main content -->
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

            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                    {{ session('success') }}
                </div>
            @endif


            @if (session('deleted'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Deleted!</h4>
                    {{ session('deleted') }}
                </div>
            @endif

            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-md-6 col-12 mb-4">
                        <!-- 2 kartu per baris pada layar medium, 1 kartu per baris pada layar kecil -->
                        <div class="card h-100">
                            <div class="image-container">
                                <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top"
                                    alt="{{ $course->title }}">
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">{{ $course->title }}</h3>
                                <p class="card-text">{{ Str::limit($course->description, 80, '...') }}</p>
                                <p class="card-text"><strong><i class="fa fa-user"></i></strong> {{ $course->dosen->name }}
                                </p>
                                <a href="{{ route('pengajar.course.materials.create', $course->id) }}"
                                    class="btn btn-success btn-sm mb-2">
                                    <i class="fa fa-plus"></i> Tambah Materi
                                </a>
                                <span style="margin-bottom: 5px;">
                                    <small></small>
                                </span>
                                <a href="{{ route('pengajar.course.materials.index', $course->id) }}"
                                    class="btn btn-primary btn-sm">
                                    <i class="fa fa-folder"></i> Lihat Materi
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>





        </section>
    </div>


@endsection
