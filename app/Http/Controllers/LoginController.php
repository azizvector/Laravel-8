<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login', [
            'title' =>  'Login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ],
            [
                'required' => 'The field is required.',
            ]
        );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('error', 'Email atau Password salah.');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
