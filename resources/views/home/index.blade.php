@extends('home.templates.index')

@section('page-content')
    <div class="hero-wrap" style="background-image: url('{{ asset('home.jpg') }}');" data-stellar-background-ratio="0.5">
        <div class=""></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-8 ftco-animate d-flex align-items-end">
                    <div class="text w-100 text-center">
                        <h1 class="mb-4">Selamat Datang Di <span>Badminton Prime One</span>.</h1>
                        <p><a href="{{ url('home/lapangan') }}" class="btn btn-danger py-2 px-4">LAPANGAN KITA</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section ftco-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <h2>Location</h2>
                    </center>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.3638105584782!2d99.1457520752913!3d2.384435747594883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e00fdad2d7341%3A0xf59ef99c591fe451!2sInstitut%20Teknologi%20Del!5e0!3m2!1sid!2sid!4v1716295952320!5m2!1sid!2sid" 
                        width="100%" height="450" style="border:0px;border-radius:10px;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <center>
                        <h6>
                            Jl. Sisingamangaraja, Sitoluama,
                            <br>
                            Laguboti, Toba Samosir
                            <br>
                            Sumatera Utara, Indonesia 22381
                        </h6>
                    </center>
                </div>
            </div>
        </div>
    </section>
@endsection
