@extends('admin.layout.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Peminjaman Buku</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Beranda</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row justify-content-center">

                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-md-10">
                        <div class="card shadow-sm rounded">
                            <div class="card-header bg-success text-white">
                                <h5 class="mb-0"><i class="fas fa-book-reader me-2"></i> Form Transaksi Peminjaman Buku
                                </h5>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    @csrf

                                    {{-- Pilih Anggota --}}
                                    <div class="mb-4">
                                        <label for="anggota_id" class="form-label">Pilih Anggota</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <select class="form-select" id="anggota_id" name="anggota_id" required>
                                                <option selected disabled value="">Pilih Anggota...</option>
                                                <option value="1">Andi Pratama (A001)</option>
                                                <option value="2">Budi Santoso (B002)</option>
                                                <option value="3">Citra Dewi (C003)</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Pilih Buku --}}
                                    <div class="mb-4">
                                        <label for="buku_id" class="form-label">Pilih Buku</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                                            <select class="form-select" id="buku_id" name="buku_id[]" multiple required>
                                                <option disabled>Pilih Buku (bisa lebih dari satu)...</option>
                                                <option value="101">Filosofi Teras</option>
                                                <option value="102">Atomic Habits</option>
                                                <option value="103">Laut Bercerita</option>
                                                <option value="104">Sebuah Seni untuk Bersikap Bodo Amat</option>
                                            </select>
                                        </div>
                                        <small class="form-text text-muted">Tekan Ctrl (Windows) / Cmd (Mac) untuk multi
                                            select.</small>
                                    </div>

                                    <div class="row">
                                        {{-- Tanggal Pinjam --}}
                                        <div class="col-md-6 mb-4">
                                            <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                <input type="date" class="form-control" id="tanggal_pinjam"
                                                    name="tanggal_pinjam" value="{{ date('Y-m-d') }}" required>
                                            </div>
                                        </div>

                                        {{-- Estimasi Tanggal Kembali --}}
                                        <div class="col-md-6 mb-4">
                                            <label for="estimasi_tanggal_kembali" class="form-label">Estimasi Tanggal
                                                Kembali</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-calendar-check"></i></span>
                                                <input type="date" class="form-control" id="estimasi_tanggal_kembali"
                                                    name="estimasi_tanggal_kembali" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success"><i class="fas fa-save me-1"></i>
                                            Simpan
                                            Transaksi</button>
                                        <a href="#" class="btn btn-outline-secondary">Batal</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
