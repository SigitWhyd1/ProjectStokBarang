<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LgnController extends Controller
{
    public function index(){
        return view('auth.lgn');
    }

    public function lgn_proses(Request $request){
        $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);

        $data = [
            'email'     => $request->email,
            'password'  => $request->password
        ];

        if(Auth::attempt($data)){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('lgn')->with('failed', 'Email atau Password Salah!');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('lgn')->with('success', 'Anda Berhasil Logout');
    }    
}
