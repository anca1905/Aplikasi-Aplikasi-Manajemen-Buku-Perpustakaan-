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
                <form action="{{ route('adminbuku.update', ['id' => $data->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row justify-content-md-center">
                        <div class="col-md-8">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Data Buku</h3>
                                </div>
                                <form>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="cover">Cover Buku</label>
                                            <!-- Preview cover lama -->
                                            <div class="mb-3">
                                                <img src="{{ asset('storage/buku/'.$data->image) }}" alt="Cover Buku"
                                                    width="150" class="img-thumbnail">
                                            </div>
                                            <input type="file" class="form-control-file" name="image" id="image">
                                            @error('image')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="isbn">ISBN</label>
                                            <input type="text" class="form-control" name="ISBN" id="isbn"
                                                placeholder="Enter ISBN" value="{{ $data->ISBN }}">
                                            @error('ISBN')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="judul">Judul Buku</label>
                                            <input type="text" class="form-control" name="judul" id="judul"
                                                placeholder="Enter Judul Buku" value="{{ $data->judul }}">
                                            @error('judul')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="penulis">Penulis</label>
                                            <input type="text" class="form-control" name="penulis" id="penulis"
                                                placeholder="Enter Penulis" value="{{ $data->penulis }}">
                                            @error('penulis')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="tahun">Tahun Terbit</label>
                                            <input type="number" class="form-control" name="tahun" id="tahun"
                                                placeholder="Enter Tahun" value="{{ $data->tahun }}">
                                            @error('tahun')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="kategori">Kategori</label>
                                            <input type="text" class="form-control" name="kategori" id="kategori"
                                                placeholder="Kategori" value="{{ $data->kategori }}">
                                            @error('kategori')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
