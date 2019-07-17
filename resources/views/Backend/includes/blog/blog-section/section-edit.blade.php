@extends('Backend.layouts.master')

@section('content')


    <div class="content-wrapper">

        <section class="content" style="padding-top: 10px;background-color: #9f191f">
            <div class="row">



                <div class="col-sm-offset-2 col-md-8" style="padding-top: 99px;">


                    <div class="panel">
                        <div class="panel-header">
                            <h2 class="text-center" style="background-color: #9f191f; color: white;"> Edit Blog Section</h2>
                        </div>



                        <div class="panel-body">




                            <!-- /.box-header -->
                            <div class="">
                                <form role="form" action="{{ route('blog-section.update', $blogSection->id) }}" method="post" >
                                @csrf
                                    @method('PUT')


                                @include('Backend.errors.errors')

                                <!-- text input -->
                                    <div class="form-group">
                                        <label>Blog Section name</label>
                                        <input type="text" value="{{ $blogSection->name }}" name="name" class="form-control" placeholder="Enter permission- blog.(create,update,delete,status), crud" >
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-success">Update Section</button>
                                    </div>



                                </form>
                            </div>

                            <a href="{{ route('blog-section.index') }}" class="btn btn-danger btn-block">Show all Section</a>





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
