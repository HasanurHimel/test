@extends('Backend.layouts.master')

@section('content')






    <div class="content-wrapper">

        <section class="content" style="padding-top: 10px;background-color: #9f191f">
            <div class="row">



                <div class="col-md-offset-2 col-md-9">


                    <div class="panel">
                        <div class="panel-header">
                            <h2 class="text-center" style="background-color: #9f191f; color: white;"> Edit Your Profile</h2>
                        </div>



                        <div class="panel-body">




                            <!-- /.box-header -->
                            <div class="">
                                <form role="form" action="{{ route('profile.update', $profile->id ) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                @include('Backend.errors.errors')

                                <!-- text input -->
                                    <div class="form-group">
                                        <label>Your name</label>
                                        <input type="text" value="{{ $profile->name }}" name="name" class="form-control" placeholder="Enter name" >
                                    </div>

                                    <div class="form-group">
                                        <label>Your Email</label>
                                        <input type="email"name="email" value="{{ $profile->email }}" class="form-control" placeholder="Enter email" >
                                    </div>

                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input type="text" value="{{ $profile->designation }}" name="designation" class="form-control" placeholder="Enter designition">
                                    </div>

                                    <div class="form-group">
                                        <label>Experience</label>
                                        <textarea name="experience" class="form-control" rows="3" placeholder="Enter ...">{{ $profile->experience }}</textarea>
                                    </div>



                                    <div class="form-group has-feedback">


                                        <img src="{{ $profile->getFirstMediaUrl('profile') }}" class="avatar avatar-16 img-circle" id="output" style="height: 80px; width:80px; background-color: #ccc;border: 2px solid gray">

                                        <input type="file" onchange="loadFile(event)" name="image">

                                    </div>



                                    <div class="form-group">
                                        <div class="radio">
                                            <label><input type="radio" {{ $profile->publication_status ==1 ? 'checked' :'' }} name="publication_status" value="1" class="flat-red">Published</label>
                                            <label><input type="radio" {{ $profile->publication_status ==0 ? 'checked' :'' }} name="publication_status" value="0" class="flat-red">Unpublished</label>
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