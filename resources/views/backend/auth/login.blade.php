@extends('backend.auth.layout')
  <title>Login - {{ $profile->name ?? ''}}</title>
@section('title')
    Login Page
@endsection
@section('content')

    <div class="login-box">
        <h2 class="login-box-msg"><b>LOGIN</b></h2>
        <!-- /.login-logo -->
        <div class="login-box-body">
            @if($profile)
        <div class="login-logo">
            <img src="{{ asset('images/company_profile/'.$profile->login_logo) }}" alt="" class="img img-thumbnail">
        </div>
        @endif
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}"
                           autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block text-center">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            {{-- <a href="{{ route('password.request') }}">I forgot my password</a><br> --}}
        </div>
        <!-- /.login-box-body -->
    </div>
@endsection