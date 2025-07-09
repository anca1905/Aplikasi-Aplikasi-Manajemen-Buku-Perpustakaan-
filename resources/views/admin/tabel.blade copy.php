@extends('admin.layout.layout');
@section('tabelcss')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tabel Data Pengguna</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tabel Data Pengguna</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-md-center">
                    <div class="col-md">

                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="d-flex align-items-center mr-4">
                                    <a href="{{ route('adminusers.create') }}" class="btn btn-success">Tambah Data</a>
                                </div>
                                <table class="table table-bordered" id="serverside">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th style="width: 10px">No</th>
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th style="width: 200px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $d)
                                            <tr style="text-align: center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{ asset('storage/foto-user/' . $d->image) }}" width="50"
                                                        height="50" alt=""></td>
                                                <td>{{ $d->name }}</td>
                                                <td>{{ $d->email }}</td>
                                                <td style="text-align: center">
                                                    <a href="{{ route('adminusers.edit', ['id' => $d->id]) }}"
                                                        class="btn btn-success"><i class="fas fa-edit"></i>
                                                        Edit</a>
                                                    <a href="" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#modal-hapus{{ $d->id }}"><i
                                                            class="fas fa-trash"></i>
                                                        Delete</a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modal-hapus{{ $d->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Default Modal</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Apakah anda yakin ingin menghapus user {{ $d->name }}
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <form
                                                                action="{{ route('adminuser.delete', ['id' => $d->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary">Iya,
                                                                    Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <!--<div class="card-footer clearfix">
                                                                                        <ul class="pagination pagination-sm m-0 float-right">
                                                                                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                                                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                                                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>-->
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
@section('tablejs')
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#serverside').DataTable();
        });
    </script>
@endsection
