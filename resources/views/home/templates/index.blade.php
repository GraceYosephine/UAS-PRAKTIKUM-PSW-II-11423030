<!DOCTYPE html>
<html lang="en">

<head>
    <title>Badminton</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link
        href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/home/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/home/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/home/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/style.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('foto/icon1000.png') }}">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

</head>
@if (session('alert'))
    <script>
        alert("{{ session('alert') }}");
    </script>
@endif
<div class="wrap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <center>
                </center>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-danger ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar"
    style="background-color: red;">
    <div class="container">
        <a class="navbar-brand text-white" href="{{ url('home') }}">&nbsp; Badminton</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-list"></i>
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{ url('home') }}" class="nav-link text-light">Home</a></li>
                <li class="nav-item active"><a href="{{ url('home/lapangan') }}"
                        class="nav-link text-light">Lapangan</a>
                </li>
                @if (session('pengguna'))
                    <?php $akun = session('pengguna'); ?>
                    <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="dropdown04"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Akun </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="{{ url('home/akun') }}">Profil Akun</a>
                            <a class="dropdown-item" href="{{ url('home/riwayat') }}">Riwayat</a>
                            <a class="dropdown-item" href="{{ url('home/logout') }}">Logout</a>
                        </div>
                    </li>
                @else
                    <li class="nav-item active"><a href="{{ url('home/daftar') }}"
                            class="nav-link text-light">Daftar</a>
                    </li>
                    <li class="nav-item active"><a href="{{ url('home/login') }}" class="nav-link text-light">Login</a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>

@yield('page-content')
<br>
<br>
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke-miterlimit="5" stroke="#F96D00" />
    </svg></div>

<script src="{{ asset('assets/home/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/home/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('assets/home/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/home/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/home/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('assets/home/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/home/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('assets/home/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/home/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/home/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('assets/home/js/scrollax.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&sensor=false"></script>
<script src="{{ asset('assets/home/js/google-map.js') }}"></script>
<script src="{{ asset('assets/home/js/main.js') }}"></script>


</body>

</html>
