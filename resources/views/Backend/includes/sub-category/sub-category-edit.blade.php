@extends('Backend.layouts.master')

@section('content')


    <div class="content-wrapper">

        <section class="content" style="padding-top: 10px;background-color: #9f191f">
            <div class="row">



                <div class="col-md-offset-2 col-md-9">


                    <div class="panel">
                        <div class="panel-header">
                            <h2 class="text-center" style="background-color: #9f191f; color: white;"> Edit Your Sub-Catgeory</h2>
                        </div>



                        <div class="panel-body">




                            <!-- /.box-header -->
                            <div class="">
                                <form role="form" action="{{ route('subCategory.update', $subCategory->id) }}" method="post" id="category_selected">
                                @csrf
                                    @method('PUT')


                                @include('Backend.errors.errors')

                                <!-- text input -->
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="category_id">

                                            @foreach($categories as $category)

                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>

                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Sub-Category name</label>
                                        <input  type="text" value="{{ $subCategory->subcategory_name }}" name="subcategory_name" class="form-control" placeholder="Enter name" >
                                    </div>


                                    <div class="form-group">
                                        <label>Sub-Category description</label>
                                        <textarea name="subcategory_description" class="form-control" rows="3" placeholder="Enter ...">{{ $subCategory->subcategory_description }}</textarea>
                                    </div>



                                    <div class="form-group">
                                        <div class="radio">
                                            <label><input {{ $subCategory->publication_status ==1 ? 'checked' : '' }} type="radio" name="publication_status" value="1" class="flat-red">Published</label>
                                            <label><input {{ $subCategory->publication_status ==0 ? 'checked' : '' }} type="radio" name="publication_status" value="0" class="flat-red">Unpublished</label>
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


    <script>
        document.forms['category_selected'].elements['category_id'].value='{{ $subCategory->category_id }}'
    </script>

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
