@extends('template.admin.admin')

@section('title', 'Students : Online Courses')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data Students
            </h1>
            <small>Berikut adalah daftar pelajar yang aktif</small>
        </section>

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


            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Data Teachers</h3>

                            <div class="box-tools">
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                    data-target="#modal-default">
                                    Create
                                </button>

                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Teacher</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Waktu Buat</th>
                                    <th>Aksi</th>
                                </tr>
                                @if ($students->isEmpty())
                                    <tr>
                                        <td colspan="9" class="text-center">
                                            <img src="{{ asset('assets/no-data.svg') }}" alt="No Data"
                                                style="width: 150px; height: auto; margin-top:40px">
                                            <p>No Data Available</p>
                                            <!-- Opsional: untuk memberikan konteks lebih lanjut -->
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($students as $index => $teacher)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $teacher->name }}</td>
                                            <td>{{ $teacher->email }}</td>
                                            <td>
                                                @if ($teacher->role == 'mahasiswa')
                                                    Student
                                                @endif
                                            </td>
                                            <td>{{ $teacher->created_at }}</td>
                                            <td>
                                                <!-- Tombol Edit dengan Modal -->
                                                <a href="" class="btn btn-sm btn-warning">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                {{-- <button class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#editModal{{ $mahasiswa->id }}">
                                            <i class="fa fa-pencil"></i>
                                        </button> --}}
                                                <!-- Tombol Hapus -->
                                                <form action="" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
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
