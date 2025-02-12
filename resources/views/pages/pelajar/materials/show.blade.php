@extends('template.admin.admin')

@section('title', 'Lihat Materi Courses : Online Courses')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>{{ $materi->title }}</h1>
            <small>Control panel</small>
        </section>

        <section class="content">

            <div class="callout callout-success">
                {{-- <h4>I am a success callout!</h4>
                <p>This is a green callout.</p> --}}
                <p><strong>Judul Materi:</strong> {{ $materi->title }}</p>
                <p><strong>File:</strong> <a href="{{ asset('storage/' . $materi->file_path) }}" target="_blank">Download</a>
                </p>
                <p><strong>Dilihat Oleh Anda Sebanyak:</strong> {{ $view->view_count }}x</p>
            </div>


            <div class="mt-3">
                <h4>Preview Materi</h4>

                @php
                    $fileExtension = pathinfo($materi->file_path, PATHINFO_EXTENSION);
                @endphp

                @if ($fileExtension === 'pdf')
                    <!-- Preview PDF -->
                    <iframe src="{{ asset('storage/' . $materi->file_path) }}" width="100%" height="600px"></iframe>
                @elseif (in_array($fileExtension, ['doc', 'docx', 'ppt', 'pptx']))
                    <!-- Preview dokumen Microsoft Office melalui Google Docs Viewer -->
                    <iframe
                        src="https://docs.google.com/gview?url={{ asset('storage/' . $materi->file_path) }}&embedded=true"
                        width="100%" height="600px"></iframe>
                @elseif (in_array($fileExtension, ['zip', 'rar']))
                    <!-- Tidak bisa ditampilkan, hanya opsi download -->
                    <p>File ini dalam format arsip ({{ $fileExtension }}). Silakan <a
                            href="{{ asset('storage/' . $materi->file_path) }}" target="_blank">download</a> untuk melihat
                        isi.</p>
                @else
                    <p>Preview tidak tersedia untuk format file ini.</p>
                @endif
            </div>

        </section>
    </div>

@endsection
