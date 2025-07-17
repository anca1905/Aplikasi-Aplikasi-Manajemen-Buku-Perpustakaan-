@extends('admin.layout.layout')

@section('content')
<div class="content-wrapper">
    <!-- Page Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Pengguna</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminuser') }}">Daftar Pengguna</a></li>
                        <li class="breadcrumb-item active">Edit Pengguna</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('adminusers.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card shadow">
                            <div class="card-header bg-success text-white">
                                <h3 class="card-title mb-0">Form Edit Data Pengguna</h3>
                            </div>
                            <div class="card-body">
                                <!-- Foto Profil -->
                                @if ($data->image)
                                    <div class="text-center mb-3">
                                        <img src="{{ asset('storage/foto-user/' . $data->image) }}" class="img-thumbnail rounded-circle" width="120" alt="Foto Profil">
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="foto">Foto Profil</label>
                                    <input type="file" class="form-control-file" name="foto" id="foto">
                                    @error('foto')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Nama -->
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        placeholder="Masukkan Nama Lengkap" value="{{ old('nama', $data->name) }}">
                                    @error('nama')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <label for="email">Alamat Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Masukkan Email" value="{{ old('email', $data->email) }}">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <label for="password">Password Baru <small class="text-muted">(Opsional)</small></label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Masukkan Password Baru">
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('adminuser') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
