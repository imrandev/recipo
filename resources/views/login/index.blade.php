<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@extends('login.header')
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="">Recipo</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Login to continue</p>

            <form action="{{url('login/post')}}" method="POST">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <input value="{{ old('username') }}" type="text" class="form-control" name="username" placeholder="Username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @if ($errors->has('email'))
                    <label class="text-red mb-3"><i class="fa fa-info-circle"></i> {{ $errors->first('email') }}</label>
                @endif
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @if ($errors->has('password'))
                    <label class="text-red mb-3"><i class="fa fa-info-circle"></i> {{ $errors->first('password') }}</label>
                @endif
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mb-1"><a href="">I forgot my password</a></p>
            <p class="mb-1">Need Account? <a class="blue" href="{{url('/register')}}">Create Account</a></p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
</body>
</html>
