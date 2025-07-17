@extends('admin.layout.layout')

@section('content')
<div class="content-wrapper">
    <!-- Page Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Peminjaman Buku</h1>
                </div>
                <div class="col-sm-6 text-end">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Peminjaman Buku</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card shadow-sm rounded">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="fas fa-book-reader me-2"></i> Form Transaksi Peminjaman Buku</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('officersirkulasi.store') }}" method="POST">
                                @csrf
                                <div class="col-md-6 mb-4">
                                    <label for="user_id" class="form-label">Pilih Anggota (NIK)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        <select class="form-select" id="user_id" name="user_id" required>
                                            <option selected disabled value="">Pilih Anggota berdasarkan NIK...</option>                       
                                            @foreach ($data as $nik)
                                                <option value="{{ $nik->id }}">{{ $nik->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- Nomor WhatsApp --}}
                                <div class="col-md-6 mb-4">
                                    <label for="noHp" class="form-label">Nomor WhatsApp Aktif</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                                        <input type="text" class="form-control" id="noHp" name="noHp"
                                            placeholder="Contoh: 6281234567890" required value="{{ old('noHp') }}">
                                    </div>
                                    <small class="form-text text-muted">Gunakan format tanpa 0 di depan. Misal: <code>6281xxxx</code></small>
                                </div>

                                {{-- Pilih Buku --}}
                                <div class="col-md-6 mb-4">
                                    <label for="buku_id" class="form-label">Pilih Buku</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-book"></i></span>
                                        <select class="form-select" id="buku_id" name="buku_id">
                                            <option disabled>Pilih Buku (bisa lebih dari satu)...</option>
                                            @foreach ($buku as $item)
                                                <option value="{{ $item->id }}">{{ $item->judul }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <small class="form-text text-muted">Tekan Ctrl (Windows) / Cmd (Mac) untuk memilih lebih dari satu buku.</small>
                                </div>

                                {{-- Tanggal --}}
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            <input type="date" class="form-control" id="tgl_pinjam"
                                                name="tgl_pinjam" value="{{ date('Y-m-d') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="tgl_kembali" class="form-label">Estimasi Tanggal Kembali</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-calendar-check"></i></span>
                                            <input type="date" class="form-control" id="tgl_kembali"
                                                name="tgl_kembali" required value="{{ old('tgl_kembali') }}">
                                        </div>
                                    </div>
                                </div>

                                {{-- Tombol Aksi --}}
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save me-1"></i> Simpan Transaksi
                                    </button>
                                    <a href="#" class="btn btn-outline-secondary">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
