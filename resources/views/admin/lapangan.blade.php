@extends('admin.templates.index')

@section('page-content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{ url('admin/tambahlapangan') }}" class="btn btn-sm btn-primary shadow-sm float-right pull-right"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Lapangan</a>
    </div>
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Lapangan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped bg-white" id="table">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Pengelola</th>
                                    <th>Harga</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 1; ?>
                                @foreach ($lapangan as $p)
                                    <tr>
                                        <td><?php echo $nomor; ?></td>
                                        <td>{{ $p->namalapangan }}</td>
                                        <td>{{ $p->namapengelola }}</td>
                                        <td>{{ rupiah($p->hargalapangan) }}</td>
                                        <td>
                                            <img src="{{ asset('foto/' . $p->fotolapangan) }}" width="100px">
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/ubahlapangan/' . $p->idlapangan) }}"
                                                class="btn btn-warning m-1">Ubah</a>
                                            <a href="{{ url('admin/hapuslapangan/' . $p->idlapangan) }}"
                                                class="btn btn-danger m-1"
                                                onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">Hapus</a>
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
@endsection
