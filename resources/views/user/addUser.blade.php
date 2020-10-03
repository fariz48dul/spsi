@section('title', 'Tambah User')

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
                <h3 class="card-title">Tambah User</h3>
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

            <form action="{{route('add.user')}}" method="POST">

                @csrf

                <div class="card-body">

                    <div class="form-group">
                        <label>Full Nama</label>
                        <input type="text" name="name" value="{{ old('name')}}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email')}}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tanggal_lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir')}}">
                        @error('tanggal_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <input type="text" name="id_level" value="2" hidden>

                </div>
                <!-- ./card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('user')}}" class="btn btn-secondary">Batal</a>
                </div>

            </form>

        </div>
    </div>

</section>

@endsection
