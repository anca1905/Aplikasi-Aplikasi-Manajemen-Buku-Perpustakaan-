<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfficerController extends Controller
{
    public function index(){
        return view('officer.dashboard');
    }

    public function peminjaman(){
        return view('officer.index');
    }
}
