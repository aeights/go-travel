<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show(){
        return view('auth.login');
    }

    public function auth(Request $request){
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if ($credentials) {
            if (Auth::attempt($credentials)) {
                return redirect('/dashboard');
            }
            else{
                return back()->with('message','Username atau Password Anda Salah!');
            }
        }
    }
}
