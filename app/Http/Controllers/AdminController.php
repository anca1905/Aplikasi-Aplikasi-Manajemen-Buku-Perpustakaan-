<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function pengguna(){

        $data = DB::table('users')->get();

        return view('admin.pengguna', ['data' => $data]);
    } 
}
