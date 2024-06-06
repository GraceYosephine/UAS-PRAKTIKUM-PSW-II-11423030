@extends('home.templates.index')

@section('page-content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('home.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a>Home <i class="fa fa-chevron-right"></i></a></span>
                        <span><a href="product.html">Detail Transaksi <i class="fa fa-chevron-right"></i></a></span>
                    </p>
                    <h2 class="mb-0 bread">Detail Transaksi</h2>
                </div>
            </div>
        </div>
    </section>
    <section id="home-section" class="ftco-section">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered text-dark">
                            <tbody>
                                <tr>
                                    <td><strong>No. Booking</strong></td>
                                    <td>{{ $databooking->notransaksi }}</td>
                                </tr>
                                <tr>
                                    <td>Total Booking</td>
                                    <td>{{ rupiah($databooking->totalbooking) }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Nama</strong></td>
                                    <td>{{ $databooking->nama }}</td>
                                </tr>
                                <tr>
                                    <td>No. HP</td>
                                    <td>{{ $databooking->nohp }}</td>
                                </tr>
                                <tr>
                                    <td>Jam Booking</td>
                                    <td>{{ $databooking->jambooking }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>{{ tanggal(date('Y-m-d', strtotime($databooking->tanggalbooking))) }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>{{ $databooking->statusbooking }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-danger text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Lapangan</th>
                            <th>Harga</th>
                            <th>Jam</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1; ?>
                        @foreach ($datalapangan as $dp)
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td>{{ $dp->nama }}</td>
                                <td>Rp. {{ number_format($dp->harga) }}</td>
                                <td>{{ $dp->jumlah }} Jam</td>
                                <td>Rp. {{ number_format($dp->subharga) }}</td>
                            </tr>
                            <?php $nomor++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <a href="{{ url('home/notacetak/' . $id) }}" class="btn btn-success float-right" target="_blank">Nota</a>
        </div>
    </section>
@endsection
