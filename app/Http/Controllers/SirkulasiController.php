<?php

namespace App\Http\Controllers;

use App\Http\Requests\SirkulasiRequest;
use App\Models\Sirkulasi;
use Illuminate\Http\Request;

class SirkulasiController extends Controller
{
    public function index()
    {
        return view('admin.sirkulasi.index');
    }

    public function store(SirkulasiRequest $request)
    {
        $data['user_id'] = $request->user_id;
        $data['buku_id'] = $request->buku_id;
        $data['noHp'] = $request->noHp;
        $data['tgl_pinjam'] = $request->tgl_pinjam;
        $data['tgl_kembali'] = $request->tgl_kembali;
        dd($data);
        
    }
}
