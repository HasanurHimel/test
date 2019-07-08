@extends('Backend.layouts.master')

@section('content')


    <div class="content-wrapper">

        <section class="content" style="padding-top: 10px;background-color: #9f191f">
            <div class="row">



                <div class="col-md-offset-2 col-md-9">


                    <div class="panel">
                        <div class="panel-header">
                            <h2 class="text-center" style="background-color: #9f191f; color: white;"> Create Your Sub-Catgeory</h2>
                        </div>



                        <div class="panel-body">




                            <!-- /.box-header -->
                            <div class="">
                                <form role="form" action="{{ route('subCategory.store') }}" method="post" >
                                @csrf


                                @include('Backend.errors.errors')

                                <!-- text input -->
                                    <div class="form-group">
                                        <label>Category</label>
                                  <select class="form-control" name="category_id">
                                      <option value="">__Select your Catgeory__</option>
                                      @foreach($categories as $category)

                                      <option value="{{ $category->id }}">{{ $category->category_name }}</option>

                                          @endforeach
                                  </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Sub-Category name</label>
                                        <input type="text" name="subcategory_name" class="form-control" placeholder="Enter name" >
                                    </div>


                                    <div class="form-group">
                                        <label>Sub-Category description</label>
                                        <textarea name="subcategory_description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                    </div>



                                    <div class="form-group">
                                        <div class="radio">
                                            <label><input type="radio" name="publication_status" value="1" class="flat-red">Published</label>
                                            <label><input type="radio" name="publication_status" value="0" class="flat-red">Unpublished</label>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-success">Create Sub-Category</button>
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