@extends('home.templates.index')

@section('page-content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ url('home.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a>Home <i class="fa fa-chevron-right"></i></a></span>
                        <span>Pengelola <i class="fa fa-chevron-right"></i></span>
                    </p>
                    <h2 class="mb-0 bread">Pengelola</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row mb-3 pb-3">
                <div class="col-md-12 heading-section ftco-animate">
                    <h3 class="mb-4">Pengelola : {{ $pengelola->namapengelola }}</h3>
                    @if (empty($lapangan))
                        <div class="alert alert-danger">Lapangan <strong>{{ $pengelola->namapengelola }}</strong> Kosong
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($lapangan as $p)
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="product">
                            <a href="{{ url('home/detail/' . $p->idlapangan) }}" class="img-prod"><img class="img-fluid"
                                    src="{{ url('foto/' . $p->fotolapangan) }}" style="height:300px;width:100%"
                                    alt="">
                                <div class=" overlay">
                                </div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="{{ url('home/detail/' . $p->idlapangan) }}">{{ $p->namalapangan }}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price"><span>Rp {{ number_format($p->hargalapangan) }}</span></p>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">

                                        <a href="{{ url('home/detail/' . $p->idlapangan) }}"
                                            class="buy-now d-flex justify-content-center align-items-center mx-1">
                                            <span><i class="ion-ios-cart"></i></span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
