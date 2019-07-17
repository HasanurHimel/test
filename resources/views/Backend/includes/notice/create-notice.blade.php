@extends('Backend.layouts.master')

@section('content')


    <div class="content-wrapper">


        <section class="content" style="padding-top: 10px;background-color: #9f191f">
            <div class="row">



                <div class="col-md-offset-2 col-md-9">


                    <div class="panel">
                        <div class="panel-header">
                            <h2 class="text-center" style="background-color: #9f191f; color: white;"> Build Your Website Notice</h2>
                        </div>



                        <div class="panel-body">




                            <!-- /.box-header -->
                            <div class="">
                                <form role="form" action="{{ route('notice.store') }}" method="post" >
                                @csrf



                                @include('Backend.errors.errors')

                                <!-- text input -->

                                    <div class="form-group">
                                        <label>Notice</label>
                                        <textarea name="notice" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-success">Create Notice</button>
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

