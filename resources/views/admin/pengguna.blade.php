@extends('admin.layout.layout');
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
                            <div class="card-header">
                                <h3 class="card-title"> Tabel Pengguna</h3>
                                <a href="" class="btn btn-success float-sm-right">Tambah Data</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th style="width: 10px">No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th style="width: 200px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $d)
                                            <tr style="text-align: center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $d->nama_pengguna }}</td>
                                                <td>{{ $d->username }}</td>
                                                <td>{{ $d->email }}</td>
                                                <td style="text-align: center">
                                                    <a href="pengguna/edit" class="btn btn-success"><i class="fas fa-edit"></i>
                                                        Edit</a>
                                                    <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i>
                                                        Delete</a>
                                                </td>
                                            </tr>
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
