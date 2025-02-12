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
                <h4>Selamat datang, {{ $dosen->name }}!</h4>
                <hr>
                <p>Anda adalah Teacher/Pengajar dalam platform pembelajaran ini.</p>
            </div>

            <div class="row">
            </div>
        </section>
    </div>

@endsection
