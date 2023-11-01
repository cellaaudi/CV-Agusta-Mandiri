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
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="text-muted">Beranda</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Agusta Properti</li>
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
                                <th>Kategori</th>
                                <th>Tipe</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($props as $prop)
                            <tr>
                                <td>{{ $prop -> id }}</td>
                                <td>{{ $prop -> title }}</td>
                                <td>Rp. {{ $prop -> price }}</td>
                                <td>{{ $prop -> category == 'House' ? 'Rumah' : ( $prop -> category == 'Land' ? 'Tanah' : 'Villa') }}</td>
                                <td>{{ $prop -> type == 'Sell' ? 'Jual' : ( $prop -> type == 'Rent' ? 'Sewa' : 'Jual dan Sewa') }}</td>
                                <td class="{{ $prop -> status == 'Available' ? 'bg-success' : 'bg-danger' }}" style="color: #fff;">{{ $prop -> status == 'Available' ? 'Tersedia' : 'Terjual'}}</td>
                                <td>
                                    <a href="{{ route('admin.property.show', $prop) }}" type="button" class="btn btn-success btn-rounded"><i class="far fa-folder-open"></i> Detail</a>
                                    <a href="{{ route('admin.property.edit', $prop) }}" type="button" class="btn btn-warning btn-rounded"><i class="far fa-edit"></i> Edit</a>
                                    <button type="button" class="btn btn-danger btn-rounded" data-bs-toggle="modal" data-bs-target="#delModal" data-prop="{{ json_encode($prop) }}" onclick="deleteSelected(this)"><i class="far fa-trash-alt"></i> Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Danger Header Modal -->
<div id="delModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-danger">
                <h4 class="modal-title" id="danger-header-modalLabel">Hapus Produk</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <form method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btnDel">Hapus</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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

<script>
    function deleteSelected(button) {
        var data = $(button).data('prop');

        $('#delModal .modal-body p').html('Apakah Anda yakin ingin menghapus <b>' + data.title + '</b> dari daftar produk properti?');

        $('#delModal form').attr('action', '/admin/property/' + data.id);
    }
</script>
@endsection