@section('title', 'Struktur')

@extends('layouts.template')

@section('content')

<a href="{{route('add.struktur')}}" class="btn btn-primary m-3">
    <i class="fa fa-plus nav-icon"> Tambah Struktur</i>
</a>

<div class="card m-3" style="border-top: 2px solid">

    <div class="card-header ">
        <h4>Sttruktur</h4>
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
                    <th class="text-center" width="2%">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Jabatan</th>

                    <th class="text-center" width="8%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($struktur as $s)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$s->nama}}</td>
                    <td>{{$s->jabatan}}</td>

                    <td>
                        <div class="btn-group">

                            <a href="{{route('edit.struktur', encrypt($s->id))}}" class="btn btn-warning mx-1" title="Edit">
                                <i class="fa fa-edit nav-icon"></i>
                            </a>

                            <form action="{{route('delete.struktur', $s->id)}}" method="POST">

                                @csrf
                                @method('delete')
                                <button href="#" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger mx-1"><i class="fa fa-trash nav-icon"></i></button>
                            </form>

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">

            {{$struktur->links()}}

        </ul>
    </div>

</div>


@endsection
