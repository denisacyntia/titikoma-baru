@extends('layouts.user')

@section('content')
    <div class="login" id="login">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="login-wrapper" {{--data-aos="fade-up"--}}>
                        <div class="login-title">
                            <h4>Login</h4>
                        </div>
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('customer.login.submit') }}">
                            @csrf
                            <div class="form-group{{--{{ $error->has('email') ? ' has-error' : '' }}--}}">
                                <label for="email" class="col-md-4 control-label">Email</label>
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email" {{--value="{{ old('email') }}"--}}>

                                    {{--@if ($error->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $error->first('email') }}</strong>
                                    </span>
                                    @endif--}}
                                </div>
                            </div>
                            <div class="form-group{{--{{ $error->has('password') ? ' has-error' : '' }}--}}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password">

                                    {{--@if ($error->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $error->first('password') }}</strong>
                                    </span>
                                    @endif--}}
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                 <div class="col-md-12 --}}{{--col-md-offset-4--}}{{--">
                                     <div class="checkbox">
                                         <label>
                                             <input type="checkbox" name="remember"> Remember Me
                                         </label>
                                     </div>
                                 </div>
                             </div>--}}
                            <div class="form-group">
                                <div class="col-md-12 {{--col-md-offset-4--}}">
                                    <button type="submit" class="btn btn-login">
                                        <i class="fa fa-btn fa-sign-in"></i> Login
                                    </button>
                                    <p class="login-text">Belum memiliki akun?<a class="btn btn-link" href="{{ url('register-user') }}">Register</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

