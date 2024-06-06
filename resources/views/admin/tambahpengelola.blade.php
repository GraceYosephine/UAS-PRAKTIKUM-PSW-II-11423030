@extends('admin.templates.index')

@section('page-content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Pengelola</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ url('admin/simpanpengelola') }}">
                        @csrf
                        <div class="form-group">
                            <label>Nama Pengelola</label>
                            <input type="text" class="form-control" name="pengelola">
                        </div>
                        <button class="btn btn-danger" name="tambah" value="Tambah" type="submit"">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
