<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/AdminLTE.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/skins/_all-skins.min.css') }}">
    <style>
        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content-wrapper {
            flex: 1;
        }

        .main-footer {
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            position: relative;
        }

        .card-body {
            padding: 15px;
            /* Memberikan jarak di dalam card */
        }




        .card-img-top {
            width: 100%;
            height: 200px;
            /* Sesuaikan tinggi gambar */
            object-fit: cover;
            /* Agar gambar memenuhi area tanpa terpotong */
            transition: transform 0.3s ease-in-out;
        }

        .card:hover .card-img-top {
            transform: scale(1.1);
            /* Zoom-in gambar saat hover */
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }

        .card-text {
            flex-grow: 1;
        }

        .btn-detail {
            align-self: flex-end;
            margin-top: 10px;
            width: 100%;
            /* Membuat tombol ke kanan tetapi tidak terlalu jauh */
            margin-top: 10px;
        }
    </style>
    @stack('styles')
</head>

<body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
