@extends('layouts.navblog')
@section('post')
@foreach ($searched_posts as $post)
<div class="col-lg-6">
    <!-- Blog post-->
    <div class="card mb-4">
        <a href=""><img class="card-img-top" src="{{asset('wisata/'.$post->gambar)}}" alt="{{$post->gambar}}" /></a>
        <div class="card-body">
            <div class="small text-muted">{{$post->created_at}}</div>
            <h2 class="card-title h4">{{$post->nama}}</h2>
            <p class="card-title fs-5">Rp. {{$post->harga}}</p>
            <p class="card-text">{{substr($post->deskripsi,100)}}...</p>
            {{-- {{dd(strtolower(implode('-',explode(' ',$post->nama))));}} --}}
            <form action="{{ url('/'.strtolower(implode('-',explode(' ',$post->nama)))) }}" method="POST">
                @csrf
                <input name="id" value="{{$post->id}}" type="hidden" class="form-control">
                <button type="submit" class="btn btn-primary">Read more →</button>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection