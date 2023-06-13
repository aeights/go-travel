@extends('layouts.dashboard')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Wisata</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th>Harga</th>
                            <th>Alamat</th>
                            <th>Deskripsi</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th>Harga</th>
                            <th>Alamat</th>
                            <th>Deskripsi</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($wisata as $item)
                        <tr>
                            <td>{{$item->nama}}</td>
                            <td style="text-align: center"><img class="rounded shadow-sm" style="height: 30px" src="{{asset('wisata/'.$item->gambar)}}" alt="{{$item->gambar}}"></td>
                            <td>Rp. {{$item->harga}}</td>
                            <td>{{$item->alamat}}</td>
                            <td>{{$item->deskripsi}}</td>
                            <td style="width: 135px">
                                <a href="{{url('/dashboard/wisata/edit/'.$item->id)}}" class="btn btn-success">Edit</a>
                                <a href="{{url('/hapus-wisata/'.$item->id)}}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus wisata ini?')">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection