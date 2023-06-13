@extends('layouts.blog')
@section('post')
    @foreach ($posts as $post)
    <div class="col-lg-6">
        <!-- Blog post-->
        <div class="card mb-4">
            <a href=""><img class="card-img-top" src="{{asset('wisata/'.$post->gambar)}}" alt="{{$post->gambar}}" /></a>
            <div class="card-body">
                <div class="small text-muted">{{$post->created_at}}</div>
                <h2 class="card-title h4">{{$post->nama}}</h2>
                <h2 class="card-title h4">{{$post->harga}}</h3>
                <p class="card-text">{{$post->deskripsi}}</p>
                <a class="btn btn-primary" href="">Read more →</a>
            </div>
        </div>
    </div>
    @endforeach
@endsection