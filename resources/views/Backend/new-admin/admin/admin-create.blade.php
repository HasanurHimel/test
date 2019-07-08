@extends('Backend.layouts.master')

@section('content')


    <div class="content-wrapper">

        <section class="content" style="padding-top: 10px;background-color: #9f191f">
            <div class="row">



                <div class="col-sm-offset-1 col-md-10">


                    <div class="panel">
                        <div class="panel-header">
                            <h2 class="text-center" style="background-color: #9f191f; color: white;"> Create Admin</h2>
                        </div>



                        <div class="panel-body">




                            <!-- /.box-header -->
                            <div class="">
                                <form method="POST" action="{{ route('register') }}">

                                @csrf


                                @include('Backend.errors.errors')

                                <!-- text input -->
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Admin name"  autocomplete="name" autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Admin email"  autocomplete="email">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Password at least 8 character"  autocomplete="new-password">
                                    </div>

                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="confirm your password"  autocomplete="new-password">
                                    </div>

                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="number" class="form-control" name="mobile" value="{{ old('mobile') }}" placeholder="mobile number.." >
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <div class="radio">
                                            <label><input type="radio" {{ old('status')==1 ? 'checked' : '' }} name="status" value="1" class="flat-red">Activate</label>
                                            <label><input type="radio" {{ old('status') ==0 ? 'checked' : '' }} name="status" value="0" class="flat-red">DeActivate</label>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>

                                    </div>
                                        @foreach($roles as $role)
{{--                                       <div class="row">--}}
                                           <div class="col-sm-3">
                                               <div class="checkbox">
                                                   <label><input type="checkbox" name="role[]" value="{{ $role->id }}" class="flat-red">{{ $role->name }}</label>
                                               </div>
                                           </div>
{{--                                       </div>--}}
                                        @endforeach




                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-success">Create Admin</button>
                                    </div>



                                </form>
                            </div>
                            <!-- /.box-body -->





                        </div>
                    </div>






                    <!-- /.box -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>



@endsection
