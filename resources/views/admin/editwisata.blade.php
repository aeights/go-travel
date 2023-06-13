@extends('layouts.dashboard')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Wisata</h6>
        </div>
        <div class="card-body">
            <form class="" action="{{url('/edit-wisata')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$wisata->id}}">
                <input type="hidden" name="old_gambar" value="{{$wisata->gambar}}">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Wisata</label>
                        <input name="nama" value="{{$wisata->nama}}" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Wisata">
                    </div>
                    <select name="kategori_id" class="form-select" aria-label="Kategori Wisata">
                        <option selected value="{{$wisata->category_id}}">{{$wisata->category['kategori']}}</option>
                        @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->kategori}}</option>
                        @endforeach
                    </select>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Alamat Wisata</label>
                        <input name="alamat" value="{{$wisata->alamat}}" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jl. ">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Harga</label>
                        <input name="harga" value="{{$wisata->harga}}" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Rp. ">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Gambar</label>
                        <input name="gambar" class="form-control" type="file" id="formFile">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                        <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="5">{{$wisata->deskripsi}}</textarea>
                    </div>
                    <div class="">
                        <button class="btn btn-primary btn-user btn-block" type="submit">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection