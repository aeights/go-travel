<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function show(){
        return view('admin.home');
    }

    public function favorite(){
        return view('admin.favorite',[
            'data' => Favorite::all()
        ]);
    }
}
