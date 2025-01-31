@extends('admin.templates.index')

@section('page-content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Ubah Pengelola</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ url('admin/updatepengelola/' . $pengelola->idpengelola) }}">
                        @csrf

                        <div class="form-group">
                            <label>Nama Pengelola</label>
                            <input type="text" class="form-control" name="pengelola"
                                value="{{ $pengelola->namapengelola }}">
                        </div>
                        <button class="btn btn-danger" name="ubah">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
