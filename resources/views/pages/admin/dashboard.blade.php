@extends('template.admin.admin')

@section('title', 'Dashboard : Online Courses')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
            </h1>
            <small>Control panel</small>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="callout callout-success">
                <h4>Selamat datang, {{ $admin->name }}!</h4>
                <hr>
                <p>Anda adalah ADMIN dalam platform pembelajaran ini.</p>
            </div>

            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- Jumlah Courses -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ $jumlah_course }}</h3>
                            <p>Total Courses</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bookmark"></i>
                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <!-- Jumlah Mahasiswa -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $jumlah_mahasiswa }}</h3>
                            <p>Total Students</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <!-- Jumlah Dosen -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ $jumlah_dosen }}</h3>
                            <p>Total Teacher</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-university"></i>
                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <!-- Jumlah Enrollments -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ $jumlah_enrollment }}</h3>
                            <p>Total Enrollments</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-checkmark"></i>
                        </div>

                    </div>
                </div>
            </div>



        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

@endsection
