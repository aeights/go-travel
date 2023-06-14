<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Favorite;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogPostController extends Controller
{
    public function show($slug){
        $wisata = Wisata::where('slug',$slug)->first();

        if (Auth::check()) {
            if (count(Favorite::where('user_id',Auth::user()->id)->where('wisata_id',$wisata->id)->get()) == 1) {
                return view('user.post',[
                    'wisata' => Wisata::where('slug',$slug)->first(),
                    'category' => Category::all(),
                    'isFavorite' => true
                ]);
            }else {
                return view('user.post',[
                    'wisata' => Wisata::where('slug',$slug)->first(),
                    'category' => Category::all(),
                    'isFavorite' => false
                ]);
            }
        } else {
            return view('user.post',[
                'wisata' => Wisata::where('slug',$slug)->first(),
                'category' => Category::all(),
                'isFavorite' => false
            ]);
        }
    }

    public function favorite($id){
        $favorite = new Favorite();
        $favorite->user_id=Auth::user()->id;
        $favorite->wisata_id=$id;
        $favorite->save();
        return back();
    }

    public function hapusFavorite($id){
        $favorite = Favorite::where('user_id',Auth::user()->id)->where('wisata_id',$id);
        $favorite->delete();
        return back();
    }
}
