<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class BlogUserController extends Controller
{
    public function show(){
        return view('user.beranda',[
            'posts' => Wisata::all()
        ]);
    }
}
