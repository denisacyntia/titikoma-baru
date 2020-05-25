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
                            <div class="form-group{{--{{ $errors->has('name') ? ' has-error' : '' }}"--}}">
                                <label for="name" class="col-md-4 control-label">Nama Lengkap</label>
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control" name="fullname"
                                           placeholder="Masukkan nama lengkap" {{--value="{{ old('fullname') }}"--}}>

                                    {{-- @if ($errors->has('name'))
                                         <span class="help-block">
                                         <strong>{{ $errors->first('fullname') }}</strong>
                                     </span>
                                     @endif--}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Username</label>
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control" name="username"
                                           placeholder="Co: brucewayne" {{--value="{{ old('username') }}"--}}>
                                </div>
                            </div>
                            <div class="form-group{{--{{ $errors->has('email') ? ' has-error' : '' }}--}}">
                                <label for="email" class="col-md-4 control-label">Email</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email"
                                           placeholder="Co: example@email.com" {{--value="{{ old('email') }}"--}}>

                                    {{--@if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif--}}
                                </div>
                            </div>
                            <div class="form-group{{--{{ $errors->has('password') ? ' has-error' : '' }}--}}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password"
                                           placeholder="Masukkan password">

                                    {{-- @if ($errors->has('password'))
                                         <span class="help-block">
                                         <strong>{{ $errors->first('password') }}</strong>
                                     </span>
                                     @endif--}}
                                </div>
                            </div>
                            <div class="form-group{{--{{ $errors->has('password') ? ' has-error' : '' }}--}}">
                                <label for="birthdate" class="col-md-4 control-label">Tanggal Lahir</label>
                                <div class="col-md-12">
                                    <input class="form-control" id="dob" type="text"  name="dob">

                                    {{-- @if ($errors->has('password'))
                                         <span class="help-block">
                                         <strong>{{ $errors->first('password') }}</strong>
                                     </span>
                                     @endif--}}
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
                                <label for="phone_no" class="col-md-4 control-label">Nomor Telepon</label>
                                <div class="col-md-12">
                                    <input id="phone_no" type="text" class="form-control" name="phone_no"
                                           placeholder="Masukkan nomor telepon" {{--value="{{old('phone_no')}}"--}}>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-3">
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

@section('js')
    <!--  jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script>
        $(document).ready(function(){
            var date_input=$('input[name="dob"]'); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            var options={
                format: 'mm/dd/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            };
            date_input.datepicker(options);
        })
    </script>

@endsection
