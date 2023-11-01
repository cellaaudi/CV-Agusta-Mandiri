@extends('layouts.admin')

@section('css')
<!-- Custom CSS -->
<link href="{{ asset('admin/dist/css/style.min.css') }}" rel="stylesheet">
<!-- This Page CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('admin/extra-libs/prism/prism.css') }}">
@endsection

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Properti: {{ $prop -> name }}</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="text-muted">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.property.index') }}" class="text-muted">Agusta Properti</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">Detail Produk {{ $prop -> name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-end">
                <a href="{{ route('admin.property.edit', $prop) }}" type="button" class="btn btn-warning btn-rounded"><i class="far fa-edit"></i> Edit</a>
                <a type="button" class="btn btn-danger btn-rounded"><i class="far fa-trash-alt"></i> Hapus</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div id="carouselPhotos" class="carousel slide" data-bs-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach($photos as $key => $photo)
                                <li data-bs-target="#carouselPhotos" data-bs-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach($photos as $key => $photo)
                                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                    <img class="d-block w-100" src="{{ asset('storage/' . $photo->url) }}">
                                </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselPhotos" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselPhotos" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mt-4 form-horizontal">
                    <div class="form-body">
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <label class="form-control">{{ $prop -> name }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="inputHorizontal" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <label class="form-control">{{ $prop -> category }}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jquery')
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('admin/libs/popper.js/dist/umd/popper.min.js') }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('admin/extra-libs/sparkline/sparkline.js') }}"></script>
<!-- This Page JS -->
<script src="{{ asset('admin/extra-libs/prism/prism.js') }}"></script>
@endsection