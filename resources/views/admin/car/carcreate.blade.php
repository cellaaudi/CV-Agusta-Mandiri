@extends('layouts.admin')

@section('css')
@endsection

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Tambah Produk Mobil</h4>
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
                <form class="mt-3 form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('admin.car.store') }}">
                    @csrf
                    <div class="form-body">
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="inputHorizontal" placeholder="Contoh: Audi A8 Sportback" required autofocus>
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Tahun</label>
                            <div class="col-sm-10">
                                <input type="number" name="year" class="form-control @error('year') is-invalid @enderror" id="inputHorizontal" placeholder="YYYY" min="1900" max="2023" minlength="4" maxlength="4" step="1" value="2023" required>
                                @error('year')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Merk</label>
                            <div class="col-sm-10">
                                <select class="form-select mr-sm-2 @error('brand') is-invalid @enderror" id="inlineFormCustomSelect" name="brand" required>
                                    @foreach($brands as $brand)
                                    <option value="{{ $brand -> id }}">{{ $brand -> brand }}</option>
                                    @endforeach
                                </select>
                                @error('brand')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select class="form-select mr-sm-2 @error('category') is-invalid @enderror" id="inlineFormCustomSelect" name="category" required>
                                    @foreach($categories as $category)
                                    <option value="{{ $category -> id }}">{{ $category -> category }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Harga (IDR)</label>
                            <div class="col-sm-10">
                                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="inputHorizontal" placeholder="Rp 0,-" min="0" step="1" required>
                                @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Kilometer</label>
                            <div class="col-sm-10">
                                <input type="number" name="km" class="form-control @error('km') is-invalid @enderror" id="inputHorizontal" placeholder="0 km" min="0" step="1" required>
                                @error('km')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Transmisi</label>
                            <div class="col-sm-10">
                                <select class="form-select mr-sm-2 @error('transmission') is-invalid @enderror" id="inlineFormCustomSelect" name="transmission" required>
                                    <option value="Manual">Manual (MT)</option>
                                    <option value="Automatic">Matic (AT)</option>
                                    <option value="Hybrid">Hybrid</option>
                                </select>
                                @error('transmission')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Kapasitas Mesin (CC)</label>
                            <div class="col-sm-10">
                                <input type="number" name="capacity" class="form-control @error('capacity') is-invalid @enderror" id="inputHorizontal" placeholder="0 cc" min="0" step="1" required>
                                @error('capacity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Bahan bakar</label>
                            <div class="col-sm-10">
                                <select class="form-select mr-sm-2 @error('fuel') is-invalid @enderror" id="inlineFormCustomSelect" name="fuel" required>
                                    <option value="Petrol">Bensin</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="Electricity">Listrik</option>
                                    <option value="Hybrid">Hybrid</option>
                                </select>
                                @error('fuel')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea type="textarea" name="desc" class="form-control @error('desc') is-invalid @enderror" id="inputHorizontal" placeholder="Mobil dalam keadaan baik" rows="3" required></textarea>
                                @error('desc')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div id="photos" class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <div class="input-group flex-nowrap">
                                    <div class="custom-file w-100">
                                        <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photos[]" required>
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
                    </div>
                    <div class="form-actions">
                        <div class="text-end">
                            <button type="reset" class="btn btn-outline-danger btn-rounded">Hapus</button>
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
            $(this).parent().remove();
            $(this).parent().prev().remove();
        });
    });
</script>
@endsection