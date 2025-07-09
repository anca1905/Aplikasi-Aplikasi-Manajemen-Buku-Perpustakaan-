<?php

namespace App\Http\Controllers;

use App\Imports\UserImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function index(){
        return view('admin.import');
    }

    public function import(){
        return view('admin.import');
    }

    public function proses(Request $request){

        Excel::import(new UserImport(), $request->file('input'));

        return redirect()->back();
    }
}
