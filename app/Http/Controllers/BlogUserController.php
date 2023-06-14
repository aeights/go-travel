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

    public function search(Request $request){
        $validated = $request->validate([
            'keyword' => 'required'
        ]);
        if ($validated) {
            $searched_posts = Wisata::where('nama','LIKE','%'.$request->keyword.'%')->get();
            if ($searched_posts) {
                return view('user.search',
                [
                    'searched_posts' => $searched_posts,
                    'category' => Category::all()
                ]);
            }else{
                return back()->with('message','Wisata yang anda cari tidak ada');
            }
        } else{
            return back()->with('message','Ketikkan wisata yang ingin anda cari');
        }
    }

    public function category($ctg){
        return view('user.category',[
            'posts' => Wisata::where('category_id',$ctg)->get(),
            'category' => Category::all()
        ]);
    }
}
