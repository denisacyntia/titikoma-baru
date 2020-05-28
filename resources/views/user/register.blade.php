@extends('layouts.user')

@section('content')
    <div class="register">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="register-wrapper" {{--data-aos="fade-up"--}}>
                        <div class="register-title">
                            <h4>Register</h4>
                        </div>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="fullname" class="col-md-4 control-label">Nama Lengkap</label>
                                <div class="col-md-12">
                                    <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname"
                                           placeholder="Masukkan nama lengkap" value="{{ old('fullname') }}" required autocomplete="fullname" autofocus>
                                    @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Username</label>
                                <div class="col-md-12">
                                    <<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                            placeholder="Co: brucewayne" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Email</label>
                                <div class="col-md-12">
                                    <<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                            placeholder="Co: brucewayne@email.com" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password</label>
                                <div class="col-md-12">
                                    <<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                            placeholder="Masukkan password" value="{{ old('password') }}" required autocomplete="password" autofocus>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="usertype" class="col-md-4 control-label">Daftar Sebagai</label>
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="usertype" id="usertype" value="Psikolog" >
                                        <label class="form-check-label" for="usertype">
                                            Psikolog
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="usertype" id="usertype" value="Klien" >
                                        <label class="form-check-label" for="usertype">
                                            Klien
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gender" class="col-md-4 control-label">Jenis Kelamin</label>
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Laki-laki" >
                                        <label class="form-check-label" for="gender">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Perempuan" >
                                        <label class="form-check-label" for="gender">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-md-4 control-label">Nomor Telepon</label>
                                <div class="col-md-12">
                                    <<input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                            placeholder="Masukkan nomor telepon" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-register">
                                            <i class="fa fa-btn fa-user"></i> Register
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
