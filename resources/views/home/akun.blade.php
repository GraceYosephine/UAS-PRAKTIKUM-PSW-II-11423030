@extends('home.templates.index')

@section('page-content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('home.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a>Home <i
                                    class="fa fa-chevron-right"></i></a></span><span>Akun </span></p>
                    <h2 class="mb-0 bread">Akun</h2>
                </div>
            </div>
        </div>
    </section>
    <section id="home-section" class="hero">
        <form method="post" enctype="multipart/form-data" action="{{ url('home/ubahakun/' . $pengguna->id) }}">
            @csrf
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama</label>
                            <input value="{{ $pengguna->nama }}" type="text" value="" class="form-control"
                                name="nama">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input value="{{ $pengguna->email }}" type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label>No. HP</label>
                            <input value="{{ $pengguna->nohp }}" type="number" class="form-control" name="nohp">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="5">{{ $pengguna->alamat }}</textarea>
                            <script>
                                CKEDITOR.replace('alamat');
                            </script>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" name="password">
                            <input type="hidden" class="form-control" name="passwordlama"
                                value="{{ $pengguna->password }}">
                            <span class="text-primary">Kosongkan Password jika tidak ingin mengganti</span>
                        </div>
                        <button class="btn btn-danger float-right pull-right" name="ubah"><i
                                class="glyphicon glyphicon-saved"></i>Simpan</a></button>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
