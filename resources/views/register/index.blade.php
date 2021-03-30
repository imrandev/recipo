<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@extends('register.header')

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="">Recipo</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Create a New Account</p>

                <form action="{{url('register/post')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="confirmPassword" class="form-control" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('confirmPassword'))
                        <label class="text-red mb-3"><i class="fa fa-info-circle"></i> {{ $errors->first('confirmPassword') }}</label>
                    @endif
                    <div class="row">
                        <div class="col-8">

                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mb-1">Already have account? <a class="blue" href="{{url('/login')}}">Sign in</a></p>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
</body>
</html>
