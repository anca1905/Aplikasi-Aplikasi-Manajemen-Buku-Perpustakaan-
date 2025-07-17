<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    public function index(){
        return view('officer.dashboard');
    }

    public function peminjaman(){
        $data = User::all();
        $buku = Buku::all();
        return view('officer.index', compact('data', 'buku'));
    }
}
