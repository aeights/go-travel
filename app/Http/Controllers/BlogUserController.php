<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Wisata;
use Illuminate\Http\Request;

class BlogUserController extends Controller
{
    public function show(){
        $featured_post = Wisata::all()->random(1)->first();
        return view('user.beranda',[
            'posts' => Wisata::all()->except($featured_post->id),
            'featured_post' => $featured_post,
            'category' => Category::all(),
        ]);
    }
}
