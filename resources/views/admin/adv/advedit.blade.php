@extends('layouts.admin')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Produk Advertising</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Library</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<!-- multi-column ordering -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form class="mt-3 form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('admin.advertising.update', $adv->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputHorizontal" placeholder="Contoh: Meja" required autofocus value="{{ $adv -> name }}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="inputHorizontal" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <select class="form-select mr-sm-2 @error('category') is-invalid @enderror" id="inlineFormCustomSelect" name="category" required>
                                <option value="Indoor" @if($adv->category == 'Indoor') selected @endif>Indoor</option>
                                <option value="Outdoor" @if($adv->category == 'Outdoor') selected @endif>Outdoor</option>
                                <option value="IO" @if($adv->category == 'IO') selected @endif>Indoor dan Outdoor</option>
                            </select>
                            @error('category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div id="photos" class="form-group mb-3 row">
                        @foreach($photos as $key => $photo)
                        <div for="inputHorizontal" class="col-sm-2 col-form-label">{{ $key === 0 ? 'Foto' : '' }}</div>
                        <div class="col-sm-10 {{ $key === 0 ? '' : 'mt-2' }}">
                            <div class="input-group flex-nowrap">
                                <div class="custom-file w-100">
                                    <img class="img-fluid float-start" src="{{ asset('storage/' . $photo -> url) }}">
                                </div>
                                <button class="btn btn-outline-danger btnDelExistPhoto" type="button" data-id="{{ $photo -> id }}">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-sm-2 col-form-label"></div>
                        <div class="col-sm-10 mt-2">
                            <div class="input-group flex-nowrap">
                                <div class="custom-file w-100">
                                    <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photos[]">
                                </div>
                                <button class="btn btn-outline-secondary btnAddPhoto" type="button">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            @error('photo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="text-end">
                            <a href="{{ route('admin.advertising.index') }}" type="reset" class="btn btn-outline-danger btn-rounded">Batal</a>
                            <button type="submit" class="btn btn-primary btn-rounded">Simpan</button>
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
            $('#photos').append('<div class="col-sm-2 col-form-label"></div><div class="col-sm-10 mt-2"><div class="input-group flex-nowrap"><div class="custom-file w-100"><input class="form-control" type="file" name="photos[]"></div><button class="btn btn-outline-danger btnDelPhoto" type="button"><i class="fas fa-minus"></i></button></div></div>');
        })

        $(document).on('click', '.btnDelPhoto', function() {
            $(this).parent().parent().remove();
            $(this).parent().parent().prev().remove();
        });
    });
</script>
@endsection