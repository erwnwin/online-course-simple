@extends('layouts.admin')

@section('title', 'Home : Online Courses')

@section('content')
    <!-- Full Width Column -->
    <div class="content-wrapper">
        <div class="container">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Home <br>
                    <small>Ringkasan Informasi Untuk Anda</small>
                </h1>

            </section>

            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-solid">

                            <div class="box-body">
                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <img src="{{ asset('assets/img/img4.jpg') }}" alt="First slide">
                                     
                                        </div>
                                        <div class="item">
                                            <img src="{{ asset('assets/img/2448.jpg') }}" alt="Second slide">
                                    
                                        </div>
                                        <div class="item">
                                            <img src="{{ asset('assets/img/img6.jpg') }}" alt="Third slide">
                                       
                                        </div>
                                    </div>
                                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                        <span class="fa fa-angle-left"></span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                        <span class="fa fa-angle-right"></span>
                                    </a>
                                </div>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                </div>

                <div class="callout callout-danger">
                    <h4>Welcome!</h4>

                    <p>Silahkan klik menu Data Mahasiswa untuk proses CRUD (Create, Read, Update, & Delete) Data Mahasiswa.
                        <br>
                        TERIMA KASIH
                        <hr>
                        <strong>
                            <span class="badge badge-success">Anggota Kelompok</span>
                        </strong>
                    <h3>
                        <ol>
                            <li>Tahara Mauful Yusuf (20212205028)</li>
                            <li>Munadya Muhyiddin (20212205035)</li>
                        </ol>
                    </h3>
                    </p>
                </div>

                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>


@endsection
