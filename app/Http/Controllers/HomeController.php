<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Postingan;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all()->count();
        $postingan = Postingan::all()->count();
        $mahasiswa = Mahasiswa::all()->count();
        
        return view('home', [
            'title' =>  'Home',
            'active' =>  'home',
            'kategori' =>  $kategori,
            'postingan' =>  $postingan,
            'mahasiswa' =>  $mahasiswa,
        ]);
    }
}
