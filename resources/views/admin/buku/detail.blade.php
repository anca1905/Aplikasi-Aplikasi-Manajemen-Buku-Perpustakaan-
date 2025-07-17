@extends('admin.layout.layout')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Form Buku</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Form Buku</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-md-center">
                    <div class="col-md-8">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Data Buku</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="cover">Cover Buku</label>
                                    <br>
                                    <img src="{{ asset('storage/buku/'. $data->image) }}" alt="" srcset="" width="100px" height="auto">
                                </div>
                                <div class="form-group">
                                    <label for="isbn">ISBN</label>
                                    <p>{{ $data->ISBN }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="judul">Judul Buku</label>
                                    <p>{{ $data->judul }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="penulis">Penulis</label>
                                    <p>{{ $data->penulis }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="tahun">Tahun Terbit</label>
                                    <p>{{ $data->tahun }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <p>{{ $data->kategori->kategori }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
