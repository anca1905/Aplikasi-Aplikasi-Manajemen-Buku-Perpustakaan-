<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriRequest;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            
            $data = new Kategori();
            $data = $data->latest();
            

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('kategori', function ($data) {
                    return $data->kategori;
                })
                ->addColumn('jumlah', function ($data) {
                    return $data->book()->count();
                })
                ->addColumn('aksi', function ($data) {
                    return '<a href="' . route('adminusers.detail', ['id' => $data->id]) . '"class="btn btn-info"><i class="fas fa-eye"></i></a>
                            <a href="' . route('adminusers.edit', ['id' => $data->id]) . '"class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <a href="" class="btn btn-danger" data-toggle="modal" data-id="' . $data->id . '" data-nama="' . $data->name . '" "><i class="fas fa-trash"></i></a>
                            ';
                })
                ->rawColumns(['jumlah', 'aksi'])
                ->make(true);
        }

        return view('admin.kategori.index');
    }

    public function store(KategoriRequest $request)
    {
        $kategori = $request->validated();

        $kategori['kategori'] = $request->kategori;
        $kategori['deskripsi'] = $request->deskripsi;

        Kategori::create($kategori);

        return redirect()->route('adminkategori.index');
    }

    public function hapus($id)
    {
        $find = Kategori::find($id);

        $find->delete();

        return redirect()->route('adminkategori.index');
    }
}
