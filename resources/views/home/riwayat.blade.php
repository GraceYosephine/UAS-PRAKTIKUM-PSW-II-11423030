@extends('home.templates.index')
@section('page-content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('home.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a>Home <i
                                    class="fa fa-chevron-right"></i></a></span><span>Riwayat Booking <i
                                class="fa fa-chevron-right"></i></span></p>
                    <h2 class="mb-0 bread">Riwayat Booking</h2>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <section id="home-section" class="hero">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-danger text-white">
                                    <tr class="text-center">
                                        <th width="10px">No</th>
                                        <th width="25%">Daftar</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php $nomor = 1; ?>
                                    @foreach ($databooking as $db)
                                        <tr>
                                            <td><?php echo $nomor; ?></td>
                                            <td>
                                                <ul>
                                                    @foreach ($datalapangan[$db->idbookingreal] as $dp)
                                                        <li>
                                                            {{ $dp->namalapangan }} x {{ $dp->jumlah }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>{!! tanggal($db->tanggalbooking) . '<br>' . date('H:i', strtotime($db->waktu)) !!}
                                            </td>
                                            <td>{{ $db->jambooking }}</td>
                                            <td><b class="text-danger">{{ rupiah($db->totalbooking) }}</b></td>
                                            <td>{{ $db->statusbooking }}</td>
                                            <td>
                                                <a class="btn btn-info m-1"
                                                    href="{{ url('home/transaksidetail/' . $db->idbookingreal) }}">Detail</a>
                                                <a href="{{ url('home/notacetak/' . $db->idbookingreal) }}"
                                                    class="btn btn-success m-1" target="_blank">Nota</a>
                                            </td>
                                        </tr>
                                        <?php $nomor++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    $no = 1;
    $idbookings = [];
    ?>
    @foreach ($databooking as $data)
        <div class="modal fade" id="selesai<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pesanan Selesai</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ url('home/selesai') }}">
                        @csrf
                        <div class="modal-body">
                            <h5>Apakah anda yakin ingin mengkonfirmasi pesanan telah selesai ?</h5>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" class="form-contol" value="{{ $data->idbooking }}" name="idbooking">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="selesai" value="selesai" class="btn btn-danger">Konfirmasi</button>
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
    <div style="padding-top:200px"></div>
@endsection
