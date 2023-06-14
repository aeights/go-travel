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
                <p class="card-title fs-5">Rp. {{$post->harga}}</p>
                <p class="card-text">{{substr($post->deskripsi,100)}}...</p>
                <a href="{{ url('/wisata/'.$post->slug) }}" class="btn btn-primary">Read more →</a>
            </div>
        </div>
    </div>
    @endforeach
@endsection