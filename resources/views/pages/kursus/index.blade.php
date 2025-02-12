@extends('layouts.admin')

@section('title', 'Kursus : Online Courses')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <section class="content-header">
                <h1>
                    Kursus <br>
                    <small>Berikut adalah informasi kursus tersedia</small>
                </h1>
            </section>

            <section class="content">
                <div class="row">
                    @foreach ($courses as $course)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="image-container">
                                    <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top"
                                        alt="{{ $course->title }}">
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title">{{ $course->title }}</h3>
                                    <p class="card-text">{{ Str::limit($course->description, 80, '...') }}</p>
                                    <p class="card-text"><strong><i class="fa fa-user"></i></strong>
                                        {{ $course->dosen->name }}</p>
                                    <a href="" class="btn btn-danger btn-detail"><i class="fa fa-arrow-right"></i>
                                        Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>


        </div>
    </div>
@endsection
