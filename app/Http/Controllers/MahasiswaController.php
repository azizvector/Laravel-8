<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Postingan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();

        return view('mahasiswa.index', [
            'title' =>  'Mahasiswa',
            'active' =>  'mahasiswa',
            'mahasiswa' =>  $mahasiswa,
        ]);
    }

    public function create()
    {
        return view('mahasiswa.create', [
            'title' =>  'Tambah Mahasiswa',
            'active' =>  'mahasiswa',
        ]);
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', [
            'title' =>  'Edit Mahasiswa',
            'active' =>  'mahasiswa',
            'mahasiswa' =>  $mahasiswa,
        ]);
    }

    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', [
            'title' =>  'Detail Mahasiswa',
            'active' =>  'mahasiswa',
            'mahasiswa' =>  $mahasiswa,
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

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dibuat.');
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $users = User::where('mahasiswa_id', $mahasiswa->id)->first();

        $rules = [
            'nama' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'jenkel' => 'required',
            'password' => 'required|min:8',
            'alamat' => 'required',
        ];

        if ($request->nim != $mahasiswa->nim) {
            $rules['nim'] = 'required|unique:mahasiswas';
        }

        if ($request->email != $users->email) {
            $rules['email'] = 'required|email:dns|unique:users';
        }

        if ($request->username != $users->username) {
            $rules['username'] = 'required|unique:users';
        }

        $request->validate(
            $rules,
            [
                'required' => 'The field is required.',
            ]
        );

        if($request->file('image')){
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $request['foto'] = $request->file('image')->store('public/images');
        }

        $mahasiswa->update($request->all());

        $request['password'] = Hash::make($request['password']);
        $request['name'] = $request['nama'];


        $users->update($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diedit.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $users = User::where('mahasiswa_id', $mahasiswa->id)->first();
        $postingan = Postingan::where('mahasiswa_id', $mahasiswa->id)->first();

        if ($postingan) {
            return back()->with('error', 'Data Mahasiswa sedang digunakan di data Postingan.');
        }

        if ($mahasiswa->foto) {
            Storage::delete($mahasiswa->foto);
        }

        $mahasiswa->delete();
        $users->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
