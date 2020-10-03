@section('title', 'Edit Kegiatan')

@extends('layouts.template')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <!-- <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div> -->
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">

        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Edit Kegiatan</h3>
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
            <form role="form" action="{{route('update.kegiatan', encrypt($kegiatan->id))}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$kegiatan->title}}">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5">{{$kegiatan->deskripsi}}</textarea>
                        @error('deskripsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <div class="col-2">
                            <img src="{{asset ('assets/img/kegiatan/'. $kegiatan->image)}}" alt="I" class="image mb-1" style="width: 10rem;">
                        </div>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
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
            <a href="{{route('kegiatan')}}" class="btn btn-secondary">Cancel</a>
        </div>
        </form>
    </div>

    </div>
</section>

@endsection
