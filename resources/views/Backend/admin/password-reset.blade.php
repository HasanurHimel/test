@extends('Backend.admin.layout.master')

@section('title')
    Admin | Password Reset
@endsection

@section('content')

<div class="login-box">
    <div class="login-logo">
        <a href=""><b>Admin</b>Password  reset</a>
    </div>
    <!-- /.admin-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Please create your new password</p>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            @if(session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            @error('email')
            <div class="alert alert-danger" role="alert">
                <span class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-exclamation-sign"></i></span><strong> {{ $message }} !</strong>
            </div>
            @enderror

            <div class="form-group has-feedback">
                <input id="email" type="email" placeholder="enter email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input id="password" type="password" placeholder="enter password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input id="password-confirm" placeholder="confirm password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary btn-block btn-flat">Reset your password</button>
            </div>
        </form>

    </div>
    <!-- /.admin-box-body -->
</div>

@endsection