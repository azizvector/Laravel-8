<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Postingan;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();

        return view('kategori.index', [
            'title' =>  'Kategori',
            'active' =>  'kategori',
            'kategori' =>  $kategori,
        ]);
    }

    public function create()
    {
        return view('kategori.create', [
            'title' =>  'Tambah Kategori',
            'active' =>  'kategori',
        ]);
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', [
            'title' =>  'Edit Kategori',
            'active' =>  'kategori',
            'kategori' =>  $kategori,
        ]);
    }

    public function show(Kategori $kategori)
    {
        return view('kategori.show', [
            'title' =>  'Detail Kategori',
            'active' =>  'kategori',
            'kategori' =>  $kategori,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|unique:kategoris',
            ],
            [
                'required' => 'The field is required.',
            ]
        );

        Kategori::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dibuat.');
    }

    public function update(Request $request, Kategori $kategori)
    {
        if ($request->nama != $kategori->nama) {
            $request->validate(
                [
                    'nama' => 'required|unique:kategoris',
                ],
                [
                    'required' => 'The field is required.',
                ]
            );
        }

        $kategori->update($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diedit.');
    }

    public function destroy(Kategori $kategori)
    {
        $postingan = Postingan::where('kategori_id', $kategori->id)->first();

        if ($postingan) {
            return back()->with('error', 'Data kategori sedang digunakan di data Postingan.');
        }

        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
