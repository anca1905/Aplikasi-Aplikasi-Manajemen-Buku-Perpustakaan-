<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

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
}
