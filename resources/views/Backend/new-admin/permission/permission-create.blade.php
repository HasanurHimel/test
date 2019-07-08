@extends('Backend.layouts.master')

@section('content')


    <div class="content-wrapper">

        <section class="content" style="padding-top: 10px;background-color: #9f191f">
            <div class="row">



                <div class="col-sm-offset-2 col-md-8" style="padding-top: 99px;">


                    <div class="panel">
                        <div class="panel-header">
                            <h2 class="text-center" style="background-color: #9f191f; color: white;"> Create Admin Permission</h2>
                        </div>



                        <div class="panel-body">




                            <!-- /.box-header -->
                            <div class="">
                                <form role="form" action="{{ route('permission.store') }}" method="post" >
                                @csrf


                                @include('Backend.errors.errors')

                                <!-- text input -->
                                    <div class="form-group">
                                        <label>Permission name</label>
                                        <input type="text" value="" name="name" class="form-control" placeholder="Enter permission-   Post.create" >
                                    </div>

                                    <div class="form-group">
                                        <label>Permission for</label>

                                        <select class="form-control" name="permission_for_id">
                                            <option selected disabled>___Select permission for__</option>
                                            @foreach($permissions_for as $permission_for)
                                            <option value="{{ $permission_for->id }}">{{ $permission_for->name }}</option>

                                                @endforeach

                                        </select>

                                    </div>



                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-success">Create Permission</button>
                                    </div>



                                </form>
                            </div>

                            <a href="{{ route('permission.index') }}" class="btn btn-danger btn-block">Show all Permission</a>





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
