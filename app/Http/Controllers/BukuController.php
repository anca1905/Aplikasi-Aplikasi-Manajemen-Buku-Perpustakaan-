<?php

namespace App\Http\Controllers;

use App\Http\Requests\BukuRequest;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class BukuController extends Controller
{
    public function buku()
    {
        $data = Buku::get();

        return view('admin.buku.data_buku', compact('data'));
    }

    public function edit(Request $request, $id)
    {

        $data = Buku::find($id);
        return view('admin.buku.edit', compact('data'));
    }

    public function create()
    {
        return view('admin.buku.create');
    }

    public function detail($id){

        $data = Buku::find($id);

        return view('admin.buku.detail', compact('data'));
    }

    public function store(BukuRequest $request)
    {


        $data = $request->validated();
        $foto = $request->file('cover');
        $filename = date('Y-m-d') . $foto->getClientOriginalName();
        $path = 'buku/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($foto));

        $data['image']      = $filename;
        $data['ISBN']       = $request->ISBN;
        $data['judul']       = $request->judul;
        $data['penulis']       = $request->penulis;
        $data['tahun']       = $request->tahun;
        $data['kategori']      = $request->kategori;

        Buku::create($data);

        return redirect()->route('adminbuku');
    }

    public function bukuserver(Request $request)
    {
        if ($request->ajax()) {

            $search = $request->input('search')['value'];
            $data = Buku::query();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function($data) {
                    return '<img src="' . asset('storage/buku/' . $data->image) . '" width="50" height="auto" alt="">';
                })
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
                    return '<a href="' . route('adminbuku.detail', ['id' => $data->id_buku]) . '"class="btn btn-info"><i class="fas fa-eye"></i></a>
                            <a href="' . route('adminedit_buku', ['id' => $data->id_buku]) . '"class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <a href="" class="btn btn-danger" data-toggle="modal" data-id="' . $data->id . '" data-judul="' . $data->judul . '" "><i class="fas fa-trash"></i></a>
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
                ->rawColumns(['aksi', 'image'])
                ->make(true);
        }



        return view('admin.buku.data_buku', compact('request'));
    }

    public function update(BukuRequest $request, $id)
    {

        $find = Buku::find($id);

        $data = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $filename = date('Y-m-d') . $image->getClientOriginalName();
            $path = 'buku/' . $filename;

            if ($find->image) {
                Storage::disk('public')->delete('buku/' . $find->image);
            }

            Storage::disk('public')->put($path, file_get_contents($image));

            $data['image'] = $filename;
        }

        $find->update($data);

        return redirect()->route('adminbuku');
    }

    public function delete($id){
        $find = Buku::find($id);

        $find->delete($id);

        return redirect()->route('adminbuku');
    }

    public function jumlahBuku(){
        $jumlah = Buku::count();

        return view('officer.dashboard', ['jumlah' => $jumlah]);
    }
}
