@extends('admin.layout.layout')

@section('content')
<div class="content-wrapper">
    <!-- Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Pengguna</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Detail Pengguna</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <!-- User Info Card -->
                    <div class="card shadow">
                        <div class="card-header bg-success text-white">
                            <h3 class="card-title mb-0">Informasi Pengguna</h3>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <img src="{{ asset('storage/foto-user/' . $data->image) }}"
                                    class="img-thumbnail rounded-circle" width="150" alt="Foto Profil {{ $data->name }}">
                            </div>

                            <dl class="row">
                                <dt class="col-sm-4">Nama Lengkap</dt>
                                <dd class="col-sm-8">{{ $data->name }}</dd>

                                <dt class="col-sm-4">NIK</dt>
                                <dd class="col-sm-8">{{ $data->nik }}</dd>

                                <dt class="col-sm-4">Email</dt>
                                <dd class="col-sm-8">{{ $data->email }}</dd>
                            </dl>
                        </div>
                    </div>

                    <!-- Rumah Info Table -->
                    <div class="card mt-4 shadow-sm">
                        <div class="card-header bg-success text-white">
                            <h3 class="card-title mb-0">Data Rumah yang Dimiliki</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-bordered mb-0 text-center">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width: 10%">No</th>
                                        <th>Tipe Rumah</th>
                                        <th>Harga</th>
                                        <th>Lokasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data->rumah as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->tipe_rumah }}</td>
                                            <td>Rp {{ number_format($item->harga_rumah, 0, ',', '.') }}</td>
                                            <td>{{ $item->lokasi_rumah }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">Tidak ada data rumah.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- End Table -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
