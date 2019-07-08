@extends('Backend.layouts.master')

@section('content')


    <div class="content-wrapper">

        <section class="content" style="padding-top: 10px;background-color: #9f191f">
            <div class="row">



                <div class="col-sm-offset-2 col-sm-8 col-md-8" style="padding-top: 99px;">


                    <div class="panel">
                        <div class="panel-header">
                            <h2 class="text-center" style="background-color: #9f191f; color: white;"> Edit Admin Role</h2>
                        </div>



                        <div class="panel-body">




                            <!-- /.box-header -->
                            <div class="">
                                <form role="form" action="{{ route('role.update', $role->id) }}" method="post" id="selection">
                                @csrf
                                    @method('PUT')


                                @include('Backend.errors.errors')

                                <!-- text input -->
                                    <div class="form-group">
                                        <label>Role name</label>
                                        <input type="text" value="{{ $role->name }}" name="name" class="form-control" placeholder="Enter admin name" >
                                    </div>



                                    <div class="col-sm-12">

                                        @foreach($permissions_for as $permission_for)

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>{{ $permission_for->permissions == NULL ? '' : $permission_for->name}}</label>
                                                    @foreach($permission_for->permissions as $permission)

                                                        <div class="checkbox">
                                                            <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}" class="flat-red"

                                                                          @foreach ($role->permissions as $role_permit)
                                                                          @if ($role_permit->id == $permission->id)
                                                                          checked
                                                                        @endif
                                                                        @endforeach


                                                                >{{ $permission->name }}

                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-success">Update Role</button>
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

