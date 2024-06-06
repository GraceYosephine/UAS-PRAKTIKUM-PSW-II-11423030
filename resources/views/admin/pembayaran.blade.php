@extends('admin.templates.index')

@section('page-content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Booking</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered text-dark bg-white">
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
                                        <td>Tanggal</td>
                                        <td>{{ tanggal(date('Y-m-d', strtotime($databooking->tanggalbooking))) }}</td>
                                    </tr>
                                    <tr>
                                        <td>No. Jam Booking</td>
                                        <td>{{ $databooking->jambooking }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>{{ $databooking->statusbooking }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                    <table class="table table-bordered text-dark bg-white">
                        <thead class="bg-primary text-white">
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
                    <a href="{{ url('home/notacetak/' . $id) }}" class="btn btn-success float-right"
                        target="_blank">Nota</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        {{-- @if ($databooking->statusbooking != 'Selesai' && $databooking->statusbooking != 'Belum Bayar') --}}
        <div class="col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Konfirmasi</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" action="{{ url('admin/simpanpembayaran/' . $databooking->idbooking) }}">
                                @csrf
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="statusbooking">
                                        <option <?php if ($databooking->statusbooking == 'Belum di Konfirmasi') {
                                            echo 'selected';
                                        } ?> value="Belum di Konfirmasi">Belum di Konfirmasi
                                        </option>
                                        <option <?php if ($databooking->statusbooking == 'Booking Di Tolak') {
                                            echo 'selected';
                                        } ?> value="Booking Di Tolak">Booking Di Tolak</option>
                                        <option <?php if ($databooking->statusbooking == 'Booking Di Terima') {
                                            echo 'selected';
                                        } ?> value="Booking Di Terima">Booking Di Terima</option>
                                        <option <?php if ($databooking->statusbooking == 'Selesai') {
                                            echo 'selected';
                                        } ?> value="Selesai">Selesai</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Catatan</label>
                                    <textarea class="form-control" name="catatan" rows="5"></textarea>
                                </div>
                                <button class=" btn btn-danger float-right pull-right" name="proses">Simpan</button>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @endif --}}
    </div>
@endsection
