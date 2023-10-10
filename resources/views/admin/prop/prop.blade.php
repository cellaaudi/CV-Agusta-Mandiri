@extends('layouts.admin')

@section('css')
<!-- This page plugin CSS -->
<!-- <link href="{{ asset('admin/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet"> -->
<link rel="stylesheet" href="{{ asset('admin/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('admin/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css') }}">
<!-- Custom CSS -->
<link href="{{ asset('admin/dist/css/style.min.css') }}" rel="stylesheet">
<!-- <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.js') }}"> -->
@endsection

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Agusta Properti</h4>
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
                <a href="{{ route('admin.property.create') }}" class="btn btn-primary btn-rounded"><i class="fas fa-plus"></i> Tambah Produk</a>
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
                <div class="table-responsive">
                    <table id="multi_col_order" class="table border table-striped table-bordered text-nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Harga</th>
                                <th>Luas Tanah</th>
                                <th>Luas Bangunan</th>
                                <th>Kamar</th>
                                <th>Kamar Mandi</th>
                                <th>Lantai</th>
                                <th>Listrik</th>
                                <th>Sertifikasi</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($props as $prop)
                            <tr>
                                <td>{{ $prop -> id }}</td>
                                <td>{{ $prop -> title }}</td>
                                <td>Rp. {{ $prop -> price }}</td>
                                <td>{{ $prop -> land_area }} m<sup>2</sup></td>
                                <td>{!! $prop -> building_area ? "$prop->building_area m<sup>2</sup>": '-' !!}</td>
                                <td>{{ $prop -> bedroom ?: '-'}}</td>
                                <td>{{ $prop -> bathroom ?: '-'}}</td>
                                <td>{{ $prop -> story ?: '-'}}</td>
                                <td>{!! $prop -> electricity ? "$prop->electricity Watt": '-' !!}</td>
                                <td>{{ $prop -> certification }}</td>
                                <td>{{ $prop -> description }}</td>
                                <td>{{ $prop -> status }}</td>
                                <td>{{ $prop -> category }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jquery')
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('admin/libs/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- apps -->
<script src="{{ asset('admin/extra-libs/sparkline/sparkline.js') }}"></script>
<!--This page plugins -->
<script src="{{ asset('admin/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
<!-- <script src="{{ asset('DataTables/datatables.min.js') }}"></script> -->
<script>
    $(document).ready(function() {
        $('table').DataTable();
    });
</script>
@endsection