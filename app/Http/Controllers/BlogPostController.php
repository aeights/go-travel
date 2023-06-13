<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Wisata;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function show(Request $request){
        return view('user.post',[
            'wisata' => Wisata::find($request->id),
            'category' => Category::all(),
        ]);
    }
}
