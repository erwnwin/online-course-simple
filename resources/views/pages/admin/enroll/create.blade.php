@extends('template.admin.admin')

@section('title', 'Enroll Mahasiswa ke Kursus')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Enroll Mahasiswa ke Kursus</h1>
            <small>Berikut adalah form enroll students</small>
        </section>


        <section class="content">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif


            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Form Enroll Students</h3>

                            <div class="box-tools">

                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form action="{{ route('enroll.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="course_id">Pilih Kursus:</label>
                                    <select name="course_id" id="course_id" class="form-control" required>
                                        <option value="">-- Pilih Kursus --</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->title }} -
                                                {{ $course->dosen->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Pilih Mahasiswa:</label>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 2px">Pilih</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($mahasiswa as $mhs)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="mahasiswa_ids[]"
                                                                value="{{ $mhs->id }}">
                                                        </td>
                                                        <td>{{ $mhs->name }}</td>
                                                        <td>{{ $mhs->email }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success btn-sm">Enroll Students</button>
                                <a href="/enroll" class="btn btn-danger btn-sm">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </section>
    </div>
@endsection
