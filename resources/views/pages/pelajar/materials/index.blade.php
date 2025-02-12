@extends('template.admin.admin')

@section('title', 'Materi Courses : Online Courses')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Materi untuk {{ $course->title }}
            </h1>
            <small>Control panel</small>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-red">

                    <h3 class="widget-user-username">{{ $course->title }}</h3>
                    <h5 class="widget-user-desc"><i class="fa fa-user"></i> {{ $course->dosen->name }}</h5>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        @foreach ($course->materis as $materi)
                            <li><a
                                    href="{{ route('pelajar.course.materials.show', ['course_id' => $course->id, 'materi_id' => $materi->id]) }}">
                                    <strong><i class="fa fa-check"></i> {{ $materi->title }}</strong><span
                                        class="pull-right badge bg-yellow">
                                        {{ $materi->viewCountForMahasiswa(Auth::id()) }}x dilihat</span></a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div><!-- /.widget-user -->
            <!-- Small boxes (Stat box) -->

        </section>
    </div>

@endsection
