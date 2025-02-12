@extends('template.admin.admin')

@section('title', 'Courses : Online Courses')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Kursus yang Diikuti
            </h1>
            <small>Control panel</small>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-md-6 col-12 mb-4">
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

                                <a href="{{ route('pelajar.course.materials', $course->id) }}"
                                    class="btn btn-primary btn-sm">
                                    <i class="fa fa-book"></i> Lihat Materi
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>

@endsection
