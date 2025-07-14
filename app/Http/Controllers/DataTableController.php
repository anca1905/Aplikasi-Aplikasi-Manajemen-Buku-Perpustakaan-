<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use function Laravel\Prompts\search;

class DataTableController extends Controller
{
    public function serverside(Request $request)
    {

        if ($request->ajax()) {

            $data = new User();
            $data = $data->latest();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('foto', function ($data) {
                    return '<img src="' . asset('storage/foto-user/' . $data->image) . '" width="50" height="50" alt="">';
                })
                ->addColumn('nama', function ($data) {
                    return $data->name;
                })
                ->addColumn('email', function ($data) {
                    return $data->email;
                })
                ->addColumn('aksi', function ($data) {
                    return '<a href="' . route('adminusers.edit', ['id' => $data->id]) . '"class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <a href="" class="btn btn-danger" data-toggle="modal" data-id="' . $data->id . '" data-nama="' . $data->name . '" "><i class="fas fa-trash"></i></a>
                            ';
                })
                ->rawColumns(['foto', 'aksi'])
                ->make(true);
        }

        return view('admin.tabel', compact('request'));
    }

    public function bukuserver(Request $request)
    {
        if ($request->ajax()) {

            $search = $request->input('search')['value'];
            $data = Buku::query();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('judul', function ($data) {
                    return $data->judul;
                })
                ->addColumn('ISBN', function ($data) {
                    return $data->ISBN;
                })
                ->addColumn('penulis', function ($data) {
                    return $data->penulis;
                })
                ->addColumn('tahun', function ($data) {
                    return $data->tahun;
                })
                ->addColumn('kategori', function ($data) {
                    return $data->kategori;
                })
                ->addColumn('aksi', function ($data) {
                    return '<a href="' . route('adminedit_buku', ['id' => $data->id]) . '"class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <a href="" class="btn btn-danger" data-toggle="modal" data-id="' . $data->id . '" data-nama="' . $data->name . '" "><i class="fas fa-trash"></i></a>
                            ';
                })
                ->filter(function ($query) use ($search) {
                    if ($search) {
                        $query->where('judul', 'like', "%" . $search . "%");
                    }
 
                    if ($search) {
                        $query->where('penulis', 'like', "%" . $search . "%");
                    }
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }



        return view('admin.buku.data_buku', compact('request'));
    }
}
