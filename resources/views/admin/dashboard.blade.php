@extends('admin.templates.index')

@section('page-content')
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="card bg-white border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Lapangan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahlapangan }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-white border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Order Hari Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahorder }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <img src="{{ asset('foto/welcome.jpg') }}" width="100%">
        </div>
    </div>
@endsection
