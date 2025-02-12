@extends('template.admin.admin')

@section('title', 'Courses : Online Courses')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data Courses
            </h1>
            <small>Berikut adalah daftar Courses</small>
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


            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Data Courses</h3>

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
                                    <th>Judul</th>
                                    <th>Deksripsi</th>
                                    <th>Pengajar/Teacher</th>
                                    <th>Aksi</th>
                                </tr>
                                @if ($courses->isEmpty())
                                    <tr>
                                        <td colspan="9" class="text-center">
                                            <img src="{{ asset('assets/no-data.svg') }}" alt="No Data"
                                                style="width: 150px; height: auto; margin-top:40px">
                                            <p>No Data Available</p>
                                            <!-- Opsional: untuk memberikan konteks lebih lanjut -->
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($courses as $index => $course)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $course->title }}</td>
                                            <td>{{ Str::limit($course->description, 80, '...') }}</td>
                                            <td>{{ $course->dosen->name }}</td>
                                            <td>
                                                <!-- Tombol Edit -->
                                                <a href="#" class="btn btn-sm btn-warning" data-toggle="modal"
                                                    data-target="#editModal-{{ $course->id }}">
                                                    <i class="fa fa-pencil"></i>
                                                </a>

                                                <!-- Tombol Hapus -->
                                                <!-- Tombol Hapus -->
                                                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#deleteModal-{{ $course->id }}">
                                                    <i class="fa fa-trash"></i>
                                                </a>

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

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Create Courses</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Judul Course</label>
                            <input type="text" class="form-control" name="title" placeholder="Judul Course" required>
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="description" placeholder="Deskripsi" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Pilih Dosen</label>
                            <select class="form-control" name="dosen_id" required>
                                <option value="">Pilih Teacher</option>
                                @foreach ($dosens as $dosen)
                                    <option value="{{ $dosen->id }}">{{ $dosen->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Gambar Course</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->



    @foreach ($courses as $course)
        <div class="modal fade" id="editModal-{{ $course->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editModalLabel-{{ $course->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Edit Course</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('courses.update', $course->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Judul Course</label>
                                <input type="text" class="form-control" name="title" value="{{ $course->title }}"
                                    required>
                            </div>

                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" name="description" required>{{ $course->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Pilih Dosen</label>
                                <select class="form-control" name="dosen_id" required>
                                    <option value="">Pilih Dosen</option>
                                    @foreach ($dosens as $dosen)
                                        <option value="{{ $dosen->id }}"
                                            {{ $course->dosen_id == $dosen->id ? 'selected' : '' }}>
                                            {{ $dosen->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Gambar Course</label>
                                <input type="file" name="image" class="form-control">
                                <img src="{{ asset('storage/' . $course->image) }}" class="img-thumbnail mt-2"
                                    width="100">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($courses as $course)
        <div class="modal fade" id="deleteModal-{{ $course->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Konfirmasi Hapus</h4>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus course <b>{{ $course->title }}</b>?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


@endsection

@push('scripts')
    {{-- <script>
        $(document).ready(function() {
            // Modal Edit
            $('.edit-btn').click(function() {
                let id = $(this).attr('data-id');
                let title = $(this).attr('data-title');
                let description = $(this).attr('data-description');
                let dosen_id = $(this).attr('data-dosen_id');
                let image = $(this).attr('data-image');

                $('#editTitle').val(title);
                $('#editDescription').val(description);
                $('#editDosen').val(dosen_id);
                $('#previewImage').attr('src', image);
                $('#editForm').attr('action', '/courses/' + id);
            });


            // Modal Hapus
            $('.delete-btn').click(function() {
                let id = $(this).data('id');
                $('#deleteForm').attr('action', '/courses/' + id);
            });
        });
    </script> --}}
@endpush
