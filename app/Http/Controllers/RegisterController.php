<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register', [
            'title' =>  'Register',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nim' => 'required|unique:mahasiswas',
                'nama' => 'required',
                'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'jenkel' => 'required',
                'email' => 'required|email:dns|unique:users',
                'username' => 'required|unique:users',
                'password' => 'required|min:8',
                'alamat' => 'required',
            ],
            [
                'required' => 'The field is required.',
            ]
        );

        if($request->file('image')){
            $request['foto'] = $request->file('image')->store('public/images');
        }
        
        $mahasiswa = Mahasiswa::create($request->all());

        if ($mahasiswa) {
            $request['password'] = Hash::make($request['password']);
            $request['mahasiswa_id'] = $mahasiswa->id;
            $request['name'] = $request['nama'];

            User::create($request->all());
        }

        return redirect('/login')->with('success', 'Daftar akun berhasil.');
    }
}
