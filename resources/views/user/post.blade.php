@extends('layouts.navblog')
@section('post')
    <!-- Post header-->
    <header class="mb-4">
        <!-- Post title-->
        <div class="col d-flex justify-content-between">
            <h1 class="fw-bolder">{{$wisata->nama}}</h1>
            @if ($isFavorite)    
            <div class="">
                <a href="{{ url('/hapus-favorite/'.$wisata->id) }}" class="btn btn-outline-danger">Hapus Favorite</a>
            </div>
            @else   
            <div class="">
                <a href="{{ url('/favorite/'.$wisata->id) }}" class="btn btn-outline-success">Favorite</a>
            </div>
            @endif
        </div>
        <p class="fs-5">Rp. {{$wisata->harga}}</p>
        <!-- Post meta content-->
        <div class="text-muted fst-italic mb-2">Posted on {{$wisata->created_at}}</div>
        <!-- Post categories-->
        <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{$wisata->category['kategori']}}</a>
    </header>
    <!-- Preview image figure-->
    <figure class="mb-4"><img class="img-fluid rounded" src="{{asset('wisata/'.$wisata->gambar)}}" alt="{{$wisata->gambar}}" /></figure>
    <!-- Post content-->
    <section class="mb-5">
        <p class="fs-5 mb-4">{{$wisata->deskripsi}}</p>
    </section>
@endsection