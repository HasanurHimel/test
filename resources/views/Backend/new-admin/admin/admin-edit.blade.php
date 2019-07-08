@extends('Backend.layouts.master')

@section('content')


    <div class="content-wrapper">


        <section class="content" style="padding-top: 10px;background-color: #9f191f">
            <div class="row">



                <div class="col-sm-offset-1 col-md-10">


                    <div class="panel">
                        <div class="panel-header">
                            <h2 class="text-center" style="background-color: #9f191f; color: white;"> Edit Admin</h2>
                        </div>



                        <div class="panel-body">




                            <!-- /.box-header -->
                            <div class="">
                                <form method="POST" action="{{ route('admin.update', $admin->id) }}">

                                @csrf
                                    @method('PUT')


                                @include('Backend.errors.errors')

                                <!-- text input -->
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $admin->name }}" required autocomplete="name" autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $admin->email }}" required autocomplete="email">
                                    </div>

                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="number" class="form-control" name="mobile" value="{{ old('mobile')  ?? $admin->mobile }}" placeholder="mobile number.." required>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <div class="radio">
                                            <label><input type="radio" name="status" {{ $admin->status ==1 ? 'checked' : '' }} value="1" class="flat-red">Activate</label>
                                            <label><input type="radio" name="status" {{ $admin->status ==0 ? 'checked' : '' }} value="0" class="flat-red">DeActivate</label>
                                        </div>

                                    </div>



                                    <div class="form-group">
                                        <label>Role</label>

                                    </div>
                                    @foreach($roles as $role)
                                        {{--                                       <div class="row">--}}
                                        <div class="col-sm-3">
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="role[]" value="{{ $role->id }}" class="flat-red"
                                                              @foreach ($admin->roles as $admin_role)
                                                              @if ($admin_role->id == $role->id)
                                                              checked
                                                            @endif
                                                            @endforeach

                                                    >{{ $role->name }}</label>
                                            </div>
                                        </div>
                                        {{--                                       </div>--}}
                                    @endforeach


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-success">Update Admin</button>
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
