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
            <!-- Small boxes (Stat box) -->

            <div class="callout callout-success">
                <h4>Selamat datang, {{ $mahasiswa->name }}!</h4>
                <hr>
                <p>Anda telah bergabung dalam platform pembelajaran ini.</p>
            </div>

            <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Kursus yang Diikuti</span>
                    <span class="info-box-number">{{ $jumlahKursus }}</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">
                        Anda telah mengikuti {{ $jumlahKursus }} kursus di platform ini.
                    </span>
                </div><!-- /.info-box-content -->
            </div>

        </section>
    </div>

@endsection
