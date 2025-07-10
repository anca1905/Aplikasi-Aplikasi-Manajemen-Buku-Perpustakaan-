<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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
                    return '<a href="' . route('adminusers.edit', ['id' => $data->id]) . '"class="btn btn-success"><i class="fas fa-edit"></i>Edit</a>
                            <a href="" class="btn btn-danger" data-toggle="modal" data-id="' . $data->id . '" data-nama="'.$data->name.'" "><i class="fas fa-trash"></i> Delete</a>';
                })
                ->rawColumns(['foto', 'aksi'])
                ->make(true);
        }

        return view('admin.tabel', compact('request'));
    }
}
