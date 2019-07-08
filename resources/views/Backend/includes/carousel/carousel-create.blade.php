@extends('Backend.layouts.master')

@section('content')


    <div class="content-wrapper">

        <section class="content" style="padding-top: 10px;background-color: #9f191f">
            <div class="row">



                <div class="col-md-offset-2 col-md-9">


                    <div class="panel">
                        <div class="panel-header">
                            <h2 class="text-center" style="background-color: #9f191f; color: white;"> Create Your Carousel</h2>
                        </div>



                        <div class="panel-body">




                            <!-- /.box-header -->
                            <div class="">
                                <form role="form" action="{{ route('carousel.store') }}" method="post" enctype="multipart/form-data">
                                @csrf


                                @include('Backend.errors.errors')

                                <!-- text input -->
                                    <div class="form-group">
                                        <label>Carousel caption</label>
                                        <input type="text" value="" name="carousel_caption" class="form-control" placeholder="Enter name" >
                                    </div>

                                    <div class="form-group">
                                        <label>Carousel Image</label>

                                        <img class="avatar avatar-16 img-circle" id="output" style="height: 80px; width:80px; background-color: #0c5460;">
                                            <input type="file" value="" onchange="loadFile(event)" name="carousel_image" class="form-control" placeholder="Enter name" >

                                    </div>



                                    <div class="form-group">
                                        <div class="radio">
                                            <label><input type="radio" name="publication_status" value="1" class="flat-red">Published</label>
                                            <label><input type="radio" name="publication_status" value="0" class="flat-red">Unpublished</label>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-success">Carousel Create</button>
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
<script type="text/javascript">


    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };


</script>