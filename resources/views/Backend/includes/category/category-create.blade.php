@extends('Backend.layouts.master')

@section('content')


    <div class="content-wrapper">


        <section class="content" style="padding-top: 10px;background-color: #9f191f">
            <div class="row">



                <div class="col-md-offset-2 col-md-9">


                    <div class="panel">
                        <div class="panel-header">
                            <h2 class="text-center" style="background-color: #9f191f; color: white;"> Create Your Catgeory</h2>
                        </div>



                        <div class="panel-body">




                            <!-- /.box-header -->
                            <div class="">
                                <form role="form" action="{{ route('category.store') }}" method="post" >
                                @csrf


                                @include('Backend.errors.errors')

                                <!-- text input -->
                                    <div class="form-group">
                                        <label>Category name</label>
                                        <input type="text" value="" name="category_name" class="form-control" placeholder="Enter name" >
                                    </div>


                                    <div class="form-group">
                                        <label>Category description</label>
                                        <textarea name="category_description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                    </div>



                                    <div class="form-group">
                                        <div class="radio">
                                            <label><input type="radio" name="publication_status" value="1" class="flat-red">Published</label>
                                            <label><input type="radio" name="publication_status" value="0" class="flat-red">Unpublished</label>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-success">Create Category</button>
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
