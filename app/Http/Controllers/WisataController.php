<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    public function show(){
        return view('admin.wisata',[
            'wisata' => Wisata::all()
        ]);
    }
    
    public function showAdd(){
        return view('admin.addwisata',[
            'categories' => Category::all()
        ]);
    }
    
    public function add(Request $request){
        $validated = $request->validate([
            'nama' => ['required'],
            'kategori_id' => ['required'],
            'alamat' => ['required'],
            'harga' => ['required'],
            'gambar' => ['required'],
            'deskripsi' => ['required'],
        ]);

        if ($validated) {
            if ($request->hasFile('gambar')) {
                $wisata = new Wisata();
                $request->file('gambar')->move('wisata/',date('YmdHis') . "." .$request->file('gambar')->getClientOriginalName());
                $wisata->nama=$request->nama;
                $wisata->category_id=$request->kategori_id;
                $wisata->alamat=$request->alamat;
                $wisata->harga=$request->harga;
                $wisata->gambar=date('YmdHis') . "." .$request->file('gambar')->getClientOriginalName();
                $wisata->deskripsi=$request->deskripsi;
                $wisata->save();
                return redirect('/dashboard/wisata');
            }
        }
    }

    public function showEdit($id){
        return view('admin.editwisata',[
            'wisata' => Wisata::find($id)->first(),
            'categories' => Category::all()
        ]);
    }

    public function edit(Request $request){
        $validated = $request->validate([
            'nama' => ['required'],
            'alamat' => ['required'],
            'harga' => ['required'],
            'deskripsi' => ['required'],
        ]);

        if ($validated) {
            if ($request->hasFile('gambar')) {
                $wisata = Wisata::find($request->id);
                $request->file('gambar')->move('wisata/',date('YmdHis') . "." .$request->file('gambar')->getClientOriginalName());
                unlink("wisata/".$request->old_gambar);
                $wisata->nama=$request->nama;
                $wisata->category_id=$request->kategori_id;
                $wisata->alamat=$request->alamat;
                $wisata->harga=$request->harga;
                $wisata->gambar=date('YmdHis') . "." .$request->file('gambar')->getClientOriginalName();
                $wisata->deskripsi=$request->deskripsi;
                $wisata->save();
                return redirect('/dashboard/wisata');
            }
            else {
                $wisata = Wisata::find($request->id);
                $wisata->nama=$request->nama;
                $wisata->alamat=$request->alamat;
                $wisata->harga=$request->harga;
                $wisata->deskripsi=$request->deskripsi;
                $wisata->save();
                return redirect('/dashboard/wisata');
            }
        }
    }

    public function delete($id){
        $wisata = Wisata::find($id);
        unlink("wisata/".$wisata->gambar);
        $wisata->delete();
        return back();
    }
}
