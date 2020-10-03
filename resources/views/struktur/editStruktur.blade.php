@section('title', 'Edit Struktur')

@extends('layouts.template')

@section('content')

<section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">

        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Edit Struktur</h3>
            </div>

            @if (session('message-danger'))
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    {{ session('message-danger') }}
                </div>
            </div>
            @endif

            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('update.struktur', encrypt($struktur->id))}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{$struktur->nama}}">
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" value="{{$struktur->jabatan}}">
                        @error('jabatan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{route('struktur')}}" class="btn btn-secondary">Cancel</a>
        </div>
        </form>
    </div>

    </div>
</section>

@endsection
