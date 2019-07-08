@extends('Backend.admin.layout.master')

@section('title')
    Admin Login | Himel
    @endsection

@section('content')

    <div class="login-box">
        <div class="login-logo">
            <a href=""><b>Admin</b>Login</a>
        </div>
        <!-- /.admin-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Please sign your valid  email & Password</p>

            @include('Backend.errors.errors')
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group has-feedback">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>


                <div class="checkbox icheck">
                    <label>
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary btn-block btn-flat">Sign In</button>
                </div>
            </form>

            <div class="text-center">
                <a href="{{ route('password.request') }}" class="btn btn-block btn-danger btn-flat">Forget password</a>
            </div>
            <!-- /.social-auth-links -->


        </div>
        <!-- /.admin-box-body -->
    </div>


    @endsection