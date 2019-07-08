@extends('Backend.admin.layout.master')

@section('title')
    Admin | Register
@endsection

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>Register</a>
    </div>
    <!-- /.admin-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Register your valid information</p>

        <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
            @csrf


            <!--            <div class="alert alert-danger" role="alert">-->
            <!--                <span class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-exclamation-sign"></i></span><strong> Please enter your valid information !</strong>-->
            <!--            </div>-->



            <div class="form-group has-feedback">
                <input type="text" name="name" class="form-control" placeholder="Your name">
                <span class="glyphicon glyphicon-header form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Your email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <img class="avatar avatar-16 img-circle" id="output" style="height: 80px; width:80px; background-color: #ccc;border: 2px solid gray">
                <input onchange="loadFile(event)" type="file" name="photo">
            </div>

            <div class="checkbox icheck">
                <label>
                    <input type="checkbox" name="remember_me"> Remember Me
                </label>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary btn-block btn-flat">Sign In</button>
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                Google+</a>
        </div>
        <!-- /.social-auth-links -->


    </div>
    <!-- /.admin-box-body -->
</div>
<!-- /.admin-box -->
@endsection