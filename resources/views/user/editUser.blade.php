@section('title', 'Edit User')

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
                <h3 class="card-title">Edit User</h3>
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

            <form action="{{route('update.user', $user->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="card-body">

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" value="{{$user->email}}" name="email" class="form-control @error('email') is-invalid @enderror" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- <div class="form-group">
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
                </div> -->

                    <div class="form-group">
                        <label>Nik</label>
                        <input type="text" name="nik" value="{{$user->nik}}" class="form-control @error('nik') is-invalid @enderror" required>
                        @error('nik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                            @if ($user->status === "tidak aktif")
                            <option value="">Pilih</option>
                            <option value="belum diproses">Belum diproses</option>
                            <option value="aktif">Aktif</option>
                            <option value="tidak aktif" selected>Tidak Aktif</option>
                            @elseif($user->status === "aktif")
                            <option value="">Pilih</option>
                            <option value="belum diproses">Belum diproses</option>
                            <option value="aktif" selected>Aktif</option>
                            <option value="tidak aktif">Tidak Aktif</option>
                            @else
                            <option value="">Pilih</option>
                            <option value="belum diproses" selected>Belum diproses</option>
                            <option value="aktif">Aktif</option>
                            <option value="tidak aktif">Tidak Aktif</option>
                            @endif
                        </select>
                        @error('jenis_kelamin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Plant</label>
                        <input type="text" name="plant" value="{{$user->plant}}" class="form-control @error('plant') is-invalid @enderror" required>
                        @error('plant')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Bagian</label>
                        <input type="text" name="bagian" value="{{$user->bagian}}" class="form-control @error('bagian') is-invalid @enderror" required>
                        @error('bagian')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="{{$user->tempat_lahir}}" class="form-control @error('tempat_lahir') is-invalid @enderror" required required>
                        @error('tempat_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{$user->tanggal_lahir->toDateString()}}" class="form-control @error('tanggal_lahir') is-invalid @enderror" required>
                        @error('tangal_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" required>
                            @if ($user->jenis_kelamin === "laki-laki")
                            <option value="">Pilih</option>
                            <option value="laki-laki" selected>Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                            @else
                            <option value="">Pilih</option>
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan" selected>Perempuan</option>
                            @endif
                        </select>
                        @error('jenis_kelamin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Agama</label>
                        <input type="text" name="agama" value="{{$user->agama}}" class="form-control @error('agama') is-invalid @enderror" required>
                        @error('agama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror" required>{{$user->alamat}}</textarea>
                        @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

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
