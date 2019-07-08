@extends('Backend.layouts.master')

@section('content')


    <div class="content-wrapper">

        <section class="content" style="padding-top: 10px;background-color: #9f191f">
            <div class="row">



                <div class="col-sm-offset-1 col-sm-10 col-md-10" style="padding-top: 30px;">


                    <div class="panel">
                        <div class="panel-header">
                            <h2 class="text-center" style="background-color: #9f191f; color: white;"> Create Admin Role</h2>
                        </div>



                        <div class="panel-body">




                            <!-- /.box-header -->
                            <div class="">
                                <form role="form" action="{{ route('role.store') }}" method="post" >
                                @csrf


                                @include('Backend.errors.errors')

                                <!-- text input -->
                                    <div class="form-group">
                                        <label>Role name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter admin name" >
                                    </div>



                                    <div class="col-sm-12">

                                    @foreach($permissions_for as $permission_for)

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>{{ $permission_for->permissions == NULL ? '' : $permission_for->name}}</label>
                                                        @foreach($permission_for->permissions as $permission)

                                                            <div class="checkbox">
                                                                <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}" class="flat-red">{{ $permission->name }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                        @endforeach
                                    </div>





                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-success">Create Role</button>
                                    </div>





                                </form>
                            </div>

                            <a href="{{ route('role.index') }}" class="btn btn-block btn-danger">Show All Role</a>





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
