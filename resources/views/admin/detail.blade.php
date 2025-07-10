@extends('admin.layout.layout');
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>General Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">General Form</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('adminusers.update', ['id' => $data->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Detail User</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <img src="{{ asset('storage/foto-user/' . $data->image) }}" width="100"
                                                height="auto" alt="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama</label>
                                            <p>{{ $data->name }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">NIK</label>
                                            <p>{{ $data->nik }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Email</label>
                                            <p>{{ $data->email }}</p>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr style="text-align: center">
                                                    <th style="width: 10px">No</th>
                                                    <th>Tipe Rumah</th>
                                                    <th>Harga Rumah</th>
                                                    <th>Lokasi Rumah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data->rumah as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->tipe_rumah }}</td>
                                                        <td>{{ $item->harga_rumah }}</td>
                                                        <td>{{ $item->lokasi_rumah }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
