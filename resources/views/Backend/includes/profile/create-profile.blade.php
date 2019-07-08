@extends('Backend.layouts.master')

@section('content')


    <div class="content-wrapper">

        <section class="content" style="padding-top: 10px;background-color: #9f191f">
            <div class="row">



                <div class="col-md-12">


                    <div class="panel">
                        <div class="panel-header">
                            <h2 class="text-center" style="background-color: #9f191f; color: white;"> Make Your Profile</h2>
                        </div>



                        <div class="panel-body">




                            <!-- /.box-header -->
                            <div class="">
                                <form role="form" action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
                                @csrf


                                @include('Backend.errors.errors')

                                <!-- text input -->
                                    <div class="form-group">
                                        <label>Your Profile Name</label>
                                        <input type="text" value="{{ auth()->user()->name }}" name="name" class="form-control" placeholder="Enter name" >
                                    </div>

                                    <div class="form-group">
                                        <label>Your Profile Email</label>
                                        <input type="email"name="email" value="{{ auth()->user()->email }}" class="form-control" placeholder="Enter email" >
                                    </div>

                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input type="text" value="" name="designation" class="form-control" placeholder="Enter designition">
                                    </div>

                                    <div class="form-group">
                                        <label>Experience</label>
                                        <textarea name="experience" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                    </div>



                                    <div class="form-group has-feedback">


                                        <img src="" class="avatar avatar-16 img-circle" id="output" style="height: 80px; width:80px; background-color: #ccc;border: 2px solid gray">

                                        <input type="file" onchange="loadFile(event)" name="image">

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