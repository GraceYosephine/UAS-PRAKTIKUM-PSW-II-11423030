@extends('home.templates.index')

@section('page-content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('home.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a>Home <i class="fa fa-chevron-right"></i></a></span>
                        <span><a href="product.html">Check Out <i class="fa fa-chevron-right"></i></a></span>
                    </p>
                    <h2 class="mb-0 bread">Check Out</h2>
                </div>
            </div>
        </div>
    </section>
    <section id="home-section" class="hero">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table id="tabelkeranjang" width="100%">
                            <thead>
                                <tr>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor = 1;
                                $grandtotal = 0;
                                ?>
                                @if (!empty(session('keranjang')))
                                    @foreach ($keranjang as $idlapangan => $jumlah)
                                        @php
                                            $lapangan = DB::table('lapangan')
                                                ->where('idlapangan', $idlapangan)
                                                ->first();
                                            $totalharga = $lapangan->hargalapangan * $jumlah;
                                        @endphp
                                        <tr>
                                            <td>
                                                <div class="card mb-3">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-10 col-6 my-auto">
                                                                <h4><strong>{{ $lapangan->namalapangan }}</strong></h4>
                                                                <div class="d-flex">
                                                                    <small class="me-3 text-danger"
                                                                        id="tulisan-<?= $idlapangan ?>">Jumlah
                                                                        Pesanan
                                                                        :
                                                                        <?= $jumlah . ' Jam ' . rupiah($lapangan->hargalapangan) ?></small>
                                                                </div>
                                                                <b class="text-danger" id="totalharga-<?= $idlapangan ?>">
                                                                    <?php
                                                                    echo rupiah($totalharga);
                                                                    ?>
                                                                </b>
                                                            </div>
                                                            <div class="col-md-2 col-6 text-center my-auto">
                                                                <img src="{{ asset('foto/' . $lapangan->fotolapangan) }}"
                                                                    width="100%" style="border-radius: 10px;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                        $nomor++;
                                        $grandtotal += $totalharga;
                                        ?>
                                    @endforeach
                                @else
                                    <td colspan="7" align="center">Keranjang Kosong</td>
                                @endif
                            </tbody>
                        </table>
                        <h2 class="text-center">Total : <?= rupiah($grandtotal) ?></h2>
                        <br><br>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-12 ftco-animate">
                    <form method="post" action="{{ url('home/docheckout') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="grandtotal" value="{{ $grandtotal }}" class="form-control"
                                    required>
                                <div class="form-group">
                                    <label>Nama Pelanggan</label>
                                    <input type="text" name="nama" value="{{ session('pengguna')->nama }}"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>No. Handphone Pelanggan</label>
                                    <input type="text" name="nohp" value="{{ session('pengguna')->nohp }}"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Booking</label>
                                    <input type="date" name="tanggalbooking" value="{{ session('pengguna')->nohp }}"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>No. Jam Booking</label>
                                    <select name="jambooking" value="" class="form-control" required>
                                        <option value="">Pilih Jam Booking</option>
                                        @foreach ($jambooking as $jambooking)
                                            <option value="{{ $jambooking->jambooking }}">
                                                {{ $jambooking->jambooking }}.00</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button class="btn btn-danger pull-right btn-lg" name="checkout">Checkout</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        // Get today's date
        var today = new Date();

        // Calculate tomorrow's date
        var tomorrow = new Date(today);
        tomorrow.setDate(tomorrow.getDate() + 1);

        // Format tomorrow's date to YYYY-MM-DD
        var dd = String(tomorrow.getDate()).padStart(2, '0');
        var mm = String(tomorrow.getMonth() + 1).padStart(2, '0'); // January is 0
        var yyyy = tomorrow.getFullYear();

        var minDate = yyyy + '-' + mm + '-' + dd;

        // Set the min attribute of the date input to tomorrow's date
        document.querySelector('input[name="tanggalbooking"]').setAttribute('min', minDate);
    </script>
@endsection
