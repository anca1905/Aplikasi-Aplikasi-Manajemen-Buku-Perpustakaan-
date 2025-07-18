@extends('admin.layout.layout')

@section('tabelcss')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css" />
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Sirkulasi Peminjaman</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Sirkulasi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card shadow-sm">
                            <div
                                class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                                <h3 class="card-title mb-0"><i class="fas fa-book-reader me-2"></i> Daftar Sirkulasi</h3>
                            </div>

                            <div class="card-body">
                                <table class="table table-bordered table-hover table-striped" id="serverside"
                                    data-url="{{ route('officersirkulasi.table') }}">
                                    <thead class="table-success text-center">
                                        <tr>
                                            <th style="width: 5%">No</th>
                                            {{-- <th>ID SKL</th>
                                            <th>Nama Buku</th>
                                            <th>Peminjam</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Jatuh Tempo</th> --}}
                                            <th style="width: 20%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- Akan diisi melalui AJAX dari file JS --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Modal Hapus -->
                        <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog"
                            aria-labelledby="modalLabelHapus" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title" id="modalLabelHapus">Konfirmasi Hapus</h5>
                                        <button type="button" class="close text-white" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin menghapus data peminjaman oleh <strong
                                                id="namaPengguna"></strong>?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form id="formHapus" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection



@push('scripts')
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
    <script src="{{ asset('js/sirkulasi.js') }}"></script>
@endpush
