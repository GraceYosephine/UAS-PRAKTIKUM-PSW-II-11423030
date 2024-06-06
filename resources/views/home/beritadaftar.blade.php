@extends('home.templates.index')

@section('page-content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('home.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a>Home <i class="fa fa-chevron-right"></i></a></span>
                        <span>Lapangan <i class="fa fa-chevron-right"></i></span>
                    </p>
                    <h2 class="mb-0 bread">Lapangan</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <?php
                $no = 1;
                ?>
                @foreach ($lapangan as $p)
                    <div class="col-md-4">
                        <a href="#" data-toggle="modal" data-target="#detail<?= $no ?>">
                            <div class="product ftco-animate">
                                <div class="img d-flex align-items-center justify-content-center"
                                    style="background-image: url('{{ asset('foto/' . $p->fotolapangan) }}');">
                                </div>
                                <div class="text text-center">
                                    <h2>{{ $p->namalapangan }}</h2>
                                    <p class="mb-0"><span class="price price-sale"></span> <span class="price">Rp
                                            {{ number_format($p->hargalapangan) }}</span></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="modal fade" id="detail<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" action="{{ url('home/pesan') }}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12 mb-5 ftco-animate">
                                                <a href="images/prod-1.jpg" class="image-popup prod-img-bg"><img
                                                        src="{{ asset('foto/' . $p->fotolapangan) }}" class="img-fluid"
                                                        alt="Colorlib Template"></a>
                                            </div>
                                            <div class="col-lg-12 product-details pl-md-5 ftco-animate">
                                                <h3>{{ $p->namalapangan }}</h3>
                                                <p class="price"><span>Rp. {{ number_format($p->hargalapangan) }}</span>
                                                </p>
                                                <p>{!! $p->deskripsilapangan !!} </p>
                                                <input type="hidden" name="idlapangan" value="{{ $p->idlapangan }}">
                                                <div class="form-group">
                                                    <label>Booking Lapangan</label>
                                                    <input type="number" placeholder="Masukkan Jumlah Disini"
                                                        min="1" class="form-control" name="jumlah" required></input>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary" name="booking">Booking</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                    $no++;
                    ?>
                @endforeach
            </div>
        </div>
    </section>
@endsection
