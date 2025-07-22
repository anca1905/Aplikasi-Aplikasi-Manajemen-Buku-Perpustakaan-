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
                <form action="{{ route('adminbuku.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-md-center">
                        <div class="col-md-8">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Data Buku</h3>
                                </div>
                                <form>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="cover">Cover Buku</label>
                                            <input type="file" class="form-control-file" name="cover" id="cover">
                                            @error('cover')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="isbn">ISBN</label>
                                            <input type="text" class="form-control" name="ISBN" id="isbn"
                                                placeholder="Enter ISBN" value="{{ old('ISBN') }}">
                                            @error('ISBN')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="judul">Judul Buku</label>
                                            <input type="text" class="form-control" name="judul" id="judul"
                                                placeholder="Enter Judul Buku" value="{{ old('judul') }}">
                                            @error('judul')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="penulis">Penulis</label>
                                            <input type="text" class="form-control" name="penulis" id="penulis"
                                                placeholder="Enter Penulis" value="{{ old('penulis') }}">
                                            @error('penulis')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="tahun">Tahun Terbit</label>
                                            <input type="number" class="form-control" name="tahun" id="tahun"
                                                placeholder="Enter Tahun" value="{{ old('tahun') }}">
                                            @error('tahun')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="tahun">Kategori</label>
                                            <select class="form-control" name="kategori">
                                                @foreach ($kategori as $k)
                                                    <option value="{{ $k->id }}">{{ $k->kategori }}</option>
                                                @endforeach
                                            </select>
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
