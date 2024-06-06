@extends('home.templates.index')

@section('page-content')

    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('home.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a>Home <i class="fa fa-chevron-right"></i></a></span>
                        <span>Keranjang </span>
                    </p>
                    <h2 class="mb-0 bread">Keranjang</h2>
                </div>
            </div>
        </div>
    </section>
    <section id="home-section" class="hero">
        <div class="container mt-4">
            <br><br>
            <table id="tabelkeranjang">
                <thead>
                    <tr>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    @if (!empty(session('keranjang')))
                        @foreach ($keranjang as $idlapangan => $jumlah)
                            @php
                                $lapangan = DB::table('lapangan')->where('idlapangan', $idlapangan)->first();
                                $totalharga = $lapangan->hargalapangan * $jumlah;
                            @endphp
                            <tr>
                                <td>
                                    <div class="card mb-5">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-9 col-6 mb-3 my-auto">
                                                    <h4><strong>{{ $lapangan->namalapangan }}</strong></h4>
                                                    <div class="d-flex mb-3">
                                                        <small class="me-3 text-danger"
                                                            id="tulisan-<?= $idlapangan ?>">Jumlah
                                                            Pesanan
                                                            :
                                                            <?= $jumlah . ' x ' . rupiah($lapangan->hargalapangan) ?></small>
                                                    </div>
                                                    <b class="text-danger" id="totalharga-<?= $idlapangan ?>">
                                                        <?php
                                                        echo rupiah($totalharga);
                                                        ?>
                                                    </b>
                                                    <br>
                                                    <div class="d-flex mt-3">
                                                        <input type="number" name="jumlah" value="<?= $jumlah ?>"
                                                            class="form-control mr-3 jumlah-lapangan"
                                                            id="jumlah-<?= $idlapangan ?>">
                                                        <a class="btn btn-danger ml-3 hapus"
                                                            data-idlapangan="<?= $idlapangan ?>" id="hapus"><i
                                                                class="fa fa-trash text-white fa-3x"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-6 mb-3 text-center my-auto">
                                                    <img src="{{ asset('foto/' . $lapangan->fotolapangan) }}" width="100%"
                                                        style="border-radius: 10px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php $nomor++; ?>
                        @endforeach
                    @else
                        <td colspan="7" align="center">Keranjang Kosong</td>
                    @endif
                </tbody>
            </table>
            <br><br>
            <div class="row justify-content-center">
                <a href="{{ url('home/lapangan') }}" class="btn btn-warning"><i class="fa fa-cart-plus"></i>Lanjutkan
                    Belanja</a>
                &nbsp;
                @if (!empty(session('keranjang')))
                    <a href="{{ url('home/checkout') }}" class="btn btn-danger">Checkout</a>
                @endif
            </div>
        </div>
    </section>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function() {
        $('.jumlah-lapangan').change(function() {
            var jumlah = $(this).val();
            var idlapangan = $(this).attr('id').split('-')[1];
            $.ajax({
                url: '{{ url('home/updatekeranjang') }}', // Use Laravel route function
                method: 'POST',
                dataType: 'json',
                data: {
                    jumlah: jumlah,
                    idlapangan: idlapangan,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    var tulisan = response.tulisan;
                    var totalharga = response.totalharga;
                    $('#totalharga-' + idlapangan).text(totalharga);
                    $('#tulisan-' + idlapangan).text(tulisan);
                }
            });
        });

        $(".hapus").click(function(e) {
            var obj = $(this);
            var idlapangan = $(this).data('idlapangan');
            $.ajax({
                url: '{{ url('home/hapuskeranjang') }}', // Use Laravel route function
                type: 'POST',
                dataType: 'json',
                data: {
                    idlapangan: idlapangan,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response) {
                        $(obj).closest("tr").remove();
                    }
                }
            });
        });
    });
</script>
