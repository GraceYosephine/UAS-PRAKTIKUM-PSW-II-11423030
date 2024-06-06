@extends('admin.templates.index')

@section('page-content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{ url('admin/tambahpengelola') }}" class="btn btn-sm btn-primary shadow-sm float-right pull-right"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Pengelola</a>
    </div>
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pengelola</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table">
                        <thead class="bg-danger text-white">
                            <tr>
                                <th>No</th>
                                <th>Pengelola</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor = 1; ?>
                            @foreach ($pengelola as $data)
                                <tr>
                                    <td><?php echo $nomor; ?></td>
                                    <td>{{ $data->namapengelola }}</td>
                                    <td>
                                        <a href="{{ url('admin/ubahpengelola/' . $data->idpengelola) }}"
                                            class="btn btn-warning btn-sm">Ubah</a>
                                        <a href="{{ url('admin/hapuspengelola/' . $data->idpengelola) }}"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">Hapus</a>
                                    </td>
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
@endsection
