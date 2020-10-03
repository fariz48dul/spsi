@section('title', 'User')

@extends('layouts.template')

@section('content')

{{-- <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#importExcel">
    <i class="fas fa-file-excel"></i> Import Excel
</button> --}}

<a href="{{route('add.user')}}" class="btn btn-primary m-3">
    <i class="fa fa-plus nav-icon"> Tambah User</i>
</a>

<div class="card m-3" style="border-top: 2px solid">

    <div class="card-header ">
        <h4>User</h4>
    </div>

    <div class="card-body">

        <!-- Alert -->
        @if (session('message-success'))
        <div class="alert alert-success alert-dismissible show fade mt-1">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                {{ session('message-success') }}
            </div>
        </div>
        @endif

        <table class="table table-striped table-bordered" id="myTable">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Nik</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Plant</th>
                    <th class="text-center">Bagian</th>
                    <th class="text-center">Tempat lahir</th>
                    <th class="text-center">Tanggal lahir</th>
                    <th class="text-center">Jenis kelamin</th>
                    <th class="text-center">Agama</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center" width="5%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user as $s)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$s->name}}</td>
                    <td>{{$s->nik}}</td>
                    <td>{{$s->status}}</td>
                    <td>{{$s->plant}}</td>
                    <td>{{$s->bagian}}</td>
                    <td>{{$s->tempat_lahir}}</td>
                    <td>{{$s->tanggal_lahir->toDateString()}}</td>
                    <td>{{$s->jenis_kelamin}}</td>
                    <td>{{$s->agama}}</td>
                    <td>{{$s->alamat}}</td>
                    <td>
                        <div class="btn-group">

                            <a href="{{route('edit.user', $s->id)}}" class="btn btn-warning btn-sm mx-1" title="Edit">
                                <i class="fa fa-edit nav-icon"></i>
                            </a>

                            <form action="{{route('delete.user', $s->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm mx-1" onclick="return confirm('Yakin ingin menghapus data?')">
                                    <i class="fa fa-trash nav-icon"></i>
                                </button>
                            </form>
                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
