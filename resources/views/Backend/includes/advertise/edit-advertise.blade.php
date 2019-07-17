@extends('Backend.layouts.master')

@section('content')


    <div class="content-wrapper">


        <section class="content" style="padding-top: 10px;background-color: #9f191f">
            <div class="row">



                <div class="col-md-offset-2 col-md-9">


                    <div class="panel">
                        <div class="panel-header">
                            <h2 class="text-center" style="background-color: #9f191f; color: white;"> Build Your Advertise</h2>
                        </div>



                        <div class="panel-body">




                            <!-- /.box-header -->
                            <div class="">
                                <form role="form" action="{{ route('advertise.update', $advertise->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                    @method('PUT')



                                @include('Backend.errors.errors')

                                <!-- text input -->

                                    <div class="form-group">
                                        <label>Ad Code</label>
                                        <textarea name="ad_code"  class="form-control" rows="8" placeholder="Enter ...">{{ $advertise->ad_code }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Image</label>
                                        <img src="{{ $advertise->getFirstMediaUrl('advertise') }}" height="60px" width="60px" alt="">
                                        <input type="file" name="image" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Do you Want to image active ?</label>
                                        <div class="checkbox">
                                            <label><input type="checkbox" {{ $advertise->image_active==1 ?'checked' : '' }} name="image_active" value="1" class="flat-red">Image Active</label>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label>Ad Position</label>
                                        <br>
                                        @foreach($positions as $position)

                                            <div class="col-md-3">
                                                <div class="radio">
                                                    <label><input {{ $advertise->ad_position_id == $position->id ?'checked' : '' }} type="radio" name="ad_position_id" value="{{ $position->id }}" class="flat-red">{{ $position->position }}</label>
                                                </div>
                                            </div>


                                        @endforeach
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-success">Build your Web Ad</button>
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

