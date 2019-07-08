@extends('Backend.layouts.master')

@section('content')


    <div class="content-wrapper">

        <section class="content" style="padding-top: 10px;background-color: #9f191f">
            <div class="row">



                <div class="col-sm-offset-2 col-sm-8 col-md-8" style="padding-top: 99px;">


                    <div class="panel">
                        <div class="panel-header">
                            <h2 class="text-center" style="background-color: #9f191f; color: white;"> Create Admin Permission For</h2>
                        </div>



                        <div class="panel-body">




                            <!-- /.box-header -->
                            <div class="">
                                <form class="form" action="{{ route('permission-for.store') }}" method="post" >
                                @csrf


                                @include('Backend.errors.errors')

                                <!-- text input -->
                                    <div class="form-group">
                                        <label>Permission For name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter permission ... Blog">
                                    </div>



                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-success">Create Permission For</button>
                                    </div>





                                </form>
                            </div>

                            <a href="{{ route('permission-for.index') }}" class="btn btn-block btn-danger">Show All Permission For</a>





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
