<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show(){
        return view('auth.register');
    }

    public function register(Request $request){
        $credentials = $request->validate([
            'fname' => ['required'],
            'lname' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'repeat_password' => ['required'],
        ]);

        if ($credentials) {
            $user = new User();
            $user->name=$request->fname.' '.$request->lname;
            $user->email=$request->email;
            $user->password=Hash::make($request->password);
            $user->role='user';
            $user->save();
            return redirect('/login');
        }
    }
}
