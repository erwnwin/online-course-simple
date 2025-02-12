@extends('template.admin.admin')

@section('title', 'Enrollment : Online Courses')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data Enroll Students
            </h1>
            <small>Berikut adalah data enroll studenst ke courses</small>
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


            @if (session('canceled'))
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Cancel!</h4>
                    {{ session('canceled') }}
                </div>
            @endif


            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Data Enrollments Students</h3>

                            <div class="box-tools">
                                {{-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#modal-default">
                                        Create
                                    </button> --}}
                                <a href="{{ route('enroll.create') }}" class="btn btn-primary btn-sm float-right">Enroll
                                    Students</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Student/Murid/Pelajar</th>
                                    <th>Kursus yang Diikuti</th>
                                    <th>Aksi</th>
                                </tr>
                                @if ($enrollments->isEmpty())
                                    <tr>
                                        <td colspan="9" class="text-center">
                                            <img src="{{ asset('assets/no-data.svg') }}" alt="No Data"
                                                style="width: 150px; height: auto; margin-top:40px">
                                            <p>No Data Available</p>
                                            <!-- Opsional: untuk memberikan konteks lebih lanjut -->
                                        </td>
                                    </tr>
                                @else
                                    @php $no = 1; @endphp
                                    @foreach ($enrollments as $mahasiswa_id => $enrolled_courses)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $enrolled_courses->first()->mahasiswa->name }}</td>
                                            <td>
                                                @foreach ($enrolled_courses as $enrollment)
                                                    <span class="label pull-right bg-green">{{ $enrollment->course->title }}
                                                        -
                                                        {{ $enrollment->course->dosen->name }}</span><br>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($enrolled_courses as $enrollment)
                                                    <form action="{{ route('enroll.destroy', $enrollment->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            style="margin-bottom: 3px;"
                                                            onclick="return confirm('Yakin ingin membatalkan enroll?')">
                                                            Batalkan {{ $enrollment->course->title }}
                                                        </button>
                                                    </form>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </table>
                            <br>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>

        </section>
    </div>
@endsection
