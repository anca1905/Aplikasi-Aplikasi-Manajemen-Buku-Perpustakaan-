<?php

namespace App\Http\Controllers;

use App\Http\Requests\SirkulasiRequest;
use App\Models\Sirkulasi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SirkulasiController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.sirkulasi.index');
    }

    public function table(Request $request)
    {
        $data = Sirkulasi::with('user', 'buku');
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('user', function ($data) {
                return $data->user->name;
            })
            ->addColumn('buku', function ($data) {
                return $data->buku->judul;
            })
            ->addColumn('aksi', function ($data) {
                return '<a href="' . route('adminusers.detail', ['id' => $data->id]) . '"class="btn btn-info"><i class="fas fa-eye"></i></a>
                            <a href="' . route('adminusers.edit', ['id' => $data->id]) . '"class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <a href="" class="btn btn-danger" data-toggle="modal" data-id="' . $data->id . '" data-nama="' . $data->name . '" "><i class="fas fa-trash"></i></a>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function store(SirkulasiRequest $request)
    {
        foreach ($request->buku_id as $id_buku) {
            Sirkulasi::create([
                'user_id' => $request->user_id,
                'buku_id' => $id_buku,
                'noHp' => $request->noHp,
                'tgl_pinjam' => $request->tgl_pinjam,
                'tgl_kembali' => $request->tgl_kembali,
                'updated_at' => now(),
                'created_at' => now(),
            ]);
        }

        return redirect()->route('officersirkulasi.index');
    }

    public function sirkulasi()
    {
        $data = Sirkulasi::all();

        dd($data);
    }
}
