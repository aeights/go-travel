@extends('layouts.dashboard')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Favorite</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Favorite</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Wisata</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Wisata</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$item->user['name']}}</td>
                            <td>{{$item->user['email']}}</td>
                            <td>{{$item->wisata['nama']}}</td>
                            <td style="width: 135px">
                                <a href="{{url('/dashboard/favorite/detail/'.$item->id)}}" class="btn btn-info btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-info-circle"></i>
                                    </span>
                                    <span class="text">Detail</span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection