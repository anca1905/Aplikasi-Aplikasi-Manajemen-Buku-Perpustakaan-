@extends('admin.layout.layout');
@section('tabelcss')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tabel Data Pengguna</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tabel Data Pengguna</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-md-center">
                    <div class="col-md">

                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="d-flex align-items-center mr-4">
                                    <a href="{{ route('adminusers.create') }}" class="btn btn-success">Tambah Data</a>
                                </div>
                                <table class="table table-bordered" id="serverside">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th style="width: 10px">No</th>
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th style="width: 200px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <!--<div class="card-footer clearfix">                                                          </div>-->
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
@section('tablejs')
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>

    <script>
        $(document).ready(function() {
            loadData();
        });

        function loadData() {
            $('#serverside').DataTable({
                processing: true,
                pagination: true,
                responsive: false,
                serveSide: true,
                searching: true,
                ordering: false,
                ajax: {
                    url: "{{ route('adminserverside') }}"
                },
                columns: [
                    {
                        data: 'no',
                        name: 'no',
                    },
                    {
                        data: 'foto',
                        name: 'foto',
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'aksi',
                        name: 'aksi ',
                    },
                ]
            });
        }
    </script>
@endsection
