@extends('Backend.layouts.master')

@section('content')


    <div class="content-wrapper">

        <section class="content" style="padding-top: 10px;background-color: #9f191f">
            <div class="row">



                <div class="col-sm-offset-2 col-sm-8 col-md-8" style="padding-top: 99px;">


                    <div class="panel">
                        <div class="panel-header">
                            <h2 class="text-center" style="background-color: #9f191f; color: white;"> Ad Position Edit</h2>
                        </div>



                        <div class="panel-body">




                            <!-- /.box-header -->
                            <div class="">
                                <form class="form" action="{{ route('ad-position.update', $position->id) }}" method="post" >
                                @csrf
                                    @method('PUT')


                                @include('Backend.errors.errors')

                                <!-- text input -->
                                    <div class="form-group">
                                        <label>Ad Position</label>
                                        <input type="text" value="{{ $position->position }}" name="position" class="form-control" placeholder="Enter permission.. Top, middle , sidebar, Footer">
                                    </div>



                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-success">Update Position</button>
                                    </div>





                                </form>
                            </div>

                            <a href="{{ route('ad-position.index') }}" class="btn btn-block btn-danger">Show Ad Position</a>





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
