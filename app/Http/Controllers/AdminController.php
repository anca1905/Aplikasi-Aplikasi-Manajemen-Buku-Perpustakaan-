<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
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
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'foto'      => 'required|mimes:png,jpg|max:2048',
            'nama'  => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

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

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'foto'      => 'nullable|mimes:png,jpg|max:2048',
            'nama'      => 'required',
            'email'     => 'required|email',
            'password'  => 'nullable',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $find = User::find($id);

        $data['name']       = $request->nama;
        $data['email']      = $request->email;




        if ($request->password) {
            $data['password']   = Hash::make($request->password);
        }
        $foto = $request->file('foto');

        if ($foto) {

            $filename = date('Y-m-d') . $foto->getClientOriginalName();
            $path = 'foto-user/' . $filename;

            if($find->image){
                Storage::disk('public')->delete('foto-user/'.$find->image);
            }

            Storage::disk('public')->put($path, file_get_contents($foto));

            $data['image'] = $filename;
        }

        $find->update($data);

        return redirect()->route('adminuser');
    }

    public function delete(Request $request, $id)
    {
        $data = User::find($id);

        $data->delete();

        return redirect()->route('adminuser');
    }
}
