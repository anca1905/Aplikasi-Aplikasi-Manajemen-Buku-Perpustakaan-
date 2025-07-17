@extends('admin.layout.layout')

@section('content')
<div class="content-wrapper">
    <!-- Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Pengguna</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tambah Pengguna</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('adminusers.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card shadow">
                            <div class="card-header bg-success text-white">
                                <h3 class="card-title mb-0">Form Data Pengguna</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="foto">Foto Profil</label>
                                    <input type="file" class="form-control-file" name="foto" id="foto">
                                    @error('foto')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        placeholder="Masukkan Nama Lengkap" value="{{ old('nama') }}">
                                    @error('nama')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Alamat Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Masukkan Email" value="{{ old('email') }}">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Kata Sandi</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Masukkan Password">
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ route('adminuser') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
