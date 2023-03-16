<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginproses(Request $request){
        if (Auth::attempt($request->only('email','password'))) {
            return redirect('home');
        }
         Alert::error('Terjadi Kesalahan', 'Username atau Password Salah !');
        return \redirect('login');
    }

}
