@extends('template.admin.admin')

@section('title', 'Profil : Online Courses')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>Profil Pengguna</h1>
            <small>Data profil pengguna online course</small>
        </section>

        <section class="content">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-6">

                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Data Pengguna</h3>


                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">
                            <form action="{{ route('profil.pengajar.update') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                                        required>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Profil</button>
                            </form>
                        </div>
                    </div>


                    <!-- Form Update Profil -->

                </div>

                <div class="col-md-6">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Data Pengguna</h3>


                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">
                            <form action="{{ route('profil.pengajar.updatePassword') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input type="password" name="new_password" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Konfirmasi Password Baru</label>
                                    <input type="password" name="new_password_confirmation" class="form-control" required>
                                </div>


                                <button type="submit" class="btn btn-warning">Update Password</button>
                            </form>
                        </div>
                    </div>
                </div>


        </section>
    </div>



@endsection
