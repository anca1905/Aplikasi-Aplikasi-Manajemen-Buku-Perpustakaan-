<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function user(){
        $data = User::get();

        return view('admin.users',compact('data'));
    }

    public function create(){
        return view('admin.create');
    }
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama'  => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        
        $data['name']       = $request->nama;
        $data['email']      = $request->email;
        $data['password']   = Hash::make($request->password);

        User::create($data);

        return redirect()->route('user');
    }

    public function edit(Request $request, $id)
    {
        $data = User::find($id);

        return view('admin.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'nama'      => 'required',
            'email'     => 'required|email',
            'password'  => 'nullable',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['name']       = $request->nama;
        $data['email']      = $request->email;
        

        if($request->password){
            $data['password']   = Hash::make($request->password);
        }

        User::whereId($id)->update($data);

        return redirect()->route('user');
    }

    public function delete(Request $request, $id){
        $data = User::find($id);

        User::whereId($id)->delete($data);

        return redirect()->route('user');
    }

}
