<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function index()
    {
        $jumlah = Buku::count();
        $users = User::count();

        return view('admin.dashboard', compact('jumlah', 'users'));
    }

    public function user(Request $request)
    {
        $data = new User;

        if ($request->get('search')) {
            $data = $data->where('name', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('email', 'LIKE', '%' . $request->get('search') . '%');
        }

        $data = $data->get();

        return view('admin.users', compact('data', 'request'));
    }

    public function create()
    {
        return view('admin.create');
    }
    public function store(AdminRequest $request)
    {
        $data = $request->validated();

        $foto = $request->file('foto');
        $filename = date('Y-m-d') . $foto->getClientOriginalName();
        $path = 'foto-user/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($foto));

        $data['image']      = $filename;
        $data['name']       = $request->nama;
        $data['email']      = $request->email;
        $data['password']   = Hash::make($request->password);

        User::create($data);

        return redirect()->route('adminuser');
    }

    public function edit(Request $request, $id)
    {
        $data = User::find($id);

        return view('admin.edit', compact('data'));
    }

    public function detail(Request $request, $id)
    {
        $data = User::find($id);

        return view('admin.detail', compact('data'));
    }

    public function update(AdminRequest $request, $id)
    {

        $find = User::find($id);

        $data = $request->validated();

        $data['name'] = $request->nama;
        $data['email'] = $request->email;

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']); // hapus dari array biar tidak update password jadi null
        }
        $foto = $request->file('foto');

        if ($foto) {

            $filename = date('Y-m-d') . $foto->getClientOriginalName();
            $path = 'foto-user/' . $filename;

            if ($find->image) {
                Storage::disk('public')->delete('foto-user/' . $find->image);
            }

            Storage::disk('public')->put($path, file_get_contents($foto));

            $data['image'] = $filename;
        }

        $find->update($data);

        return redirect()->route('adminuser');
    }

    public function delete($id)
    {
        $data = User::find($id);

        $data->delete();

        return redirect()->route('adminuser');
    }

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
                    return '<a href="' . route('adminusers.detail', ['id' => $data->id]) . '"class="btn btn-info"><i class="fas fa-eye"></i></a>
                            <a href="' . route('adminusers.edit', ['id' => $data->id]) . '"class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <a href="" class="btn btn-danger" data-toggle="modal" data-id="' . $data->id . '" data-nama="' . $data->name . '" "><i class="fas fa-trash"></i></a>
                            ';
                })
                ->rawColumns(['foto', 'aksi'])
                ->make(true);
        }

        return view('admin.tabel', compact('request'));
    }
}
