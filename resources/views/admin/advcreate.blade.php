@extends('layouts.admin')

@section('css')
@endsection

@section('breadcrumb')
<!-- <div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Agusta Advertising</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Library</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-end">
                <button type="button" class="btn btn-primary btn-rounded"><i class="fas fa-plus"></i> Tambah Produk</button>
            </div>
        </div>
    </div>
</div> -->
@endsection

@section('content')
<!-- multi-column ordering -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form class="mt-3 form-horizontal">
                    <div class="form-body">
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Nama produk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputHorizontal" placeholder="Contoh: Billboard" require>
                            </div>
                        </div>
                        <div id="photos" class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Foto produk</label>
                            <div class="col-sm-10">
                                <div class="input-group flex-nowrap">
                                    <div class="custom-file w-100">
                                        <input class="form-control" type="file" id="formFile" require>
                                    </div>
                                    <button class="btn btn-outline-secondary btnAddPhoto" type="button">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="text-end">
                            <button type="reset" class="btn btn-outline-danger btn-rounded">Batalkan</button>
                            <button type="submit" class="btn btn-primary btn-rounded">Tambah Produk</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jquery')
<script>
    $(document).ready(function() {
        $('.btnAddPhoto').click(function() {
            $('#photos').append('<div class="col-sm-2 col-form-label"></div><div class="col-sm-10 mt-2"><div class="input-group flex-nowrap"><div class="custom-file w-100"><input class="form-control" type="file" id="formFile"></div><button class="btn btn-outline-danger btnDelPhoto" type="button"><i class="fas fa-minus"></i></button></div></div>');
        })

        $(document).on('click', '.btnDelPhoto', function() {
            $(this).parent().remove();
            $(this).parent().prev().remove();
        });
    });
</script>
@endsection