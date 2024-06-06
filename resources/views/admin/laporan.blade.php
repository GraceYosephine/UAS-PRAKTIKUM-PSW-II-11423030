@extends('admin.templates.index')

@section('page-content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Order</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered bg-white" id="laporan">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>No. HP</th>
                                    <th>Daftar</th>
                                    <th>Tanggal</th>
                                    <th>Jam Booking</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 1; ?>
                                @foreach ($booking as $p)
                                    <tr>
                                        <td>{{ $nomor }}</td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->nohp }}</td>
                                        <td>
                                            @foreach ($datalapangan[$p->idbooking] as $dp)
                                                {{ $dp->namalapangan }} x {{ $dp->jumlah }} Jam
                                            @endforeach
                                        </td>
                                        <td>{{ tanggal(date('Y-m-d', strtotime($p->tanggalbooking))) }}</td>
                                        <td>{{ $p->jambooking }}</td>
                                        <td>Rp. {{ number_format($p->totalbooking) }}</td>
                                        <td>{{ $p->statusbooking }}</td>
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
@endsection
