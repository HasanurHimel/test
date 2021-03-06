@extends('Backend.layouts.master')

@section('css')
    <script src="{{ asset('/') }}ckeditor/ckeditor.js"></script>
    <script src="{{ asset('/') }}ckeditor/samples/js/sample.js"></script>
    <link rel="stylesheet" href="{{ asset('/') }}ckeditor/samples/css/samples.css">
    <link rel="stylesheet" href="{{ asset('/') }}ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
@endsection

@section('js')
   <script>
       CKEDITOR.replace( 'summary-ckeditor', {
           filebrowserBrowseUrl : "{{ URL::asset('ckeditor/kcfinder/browse.php?opener=ckeditor&type=files') }}",
           filebrowserImageBrowseUrl : "{{ URL::asset('ckeditor/kcfinder/browse.php?opener=ckeditor&type=images') }}",
           filebrowserFlashBrowseUrl : "{{ URL::asset('ckeditor/kcfinder/browse.php?opener=ckeditor&type=flash') }}",
           filebrowserUploadUrl : "{{ URL::asset('ckeditor/kcfinder/upload.php?opener=ckeditor&type=files') }}",
           filebrowserImageUploadUrl : "{{ URL::asset('ckeditor/kcfinder/upload.php?opener=ckeditor&type=images') }}",
           filebrowserFlashUploadUrl : "{{ URL::asset('ckeditor/kcfinder/upload.php?opener=ckeditor&type=flash') }}",
       });
   </script>

    @endsection

@section('content')




    <div class="content-wrapper">
        @include('Backend.errors.errors')

        <section class="content" style="padding-top: 10px;background-color: #9f191f">
            <div class="row">



                <div class="col-md-12">


                    <div class="panel">
                        <div class="panel-header">
                            <h2 class="text-center" style="background-color: #9f191f; color: white;"> Create Your Blog</h2>
                        </div>




                        <div class="panel-body">




                            <!-- /.box-header -->
                            <div class="">
                                <form role="form" action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                                @csrf




                                <!-- text input -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select class="form-control" name="category_id">
                                                    <option value="">__Select your Catgeory__</option>
                                                    @foreach($categories as $category)

                                                        <option {{ (old("category_id") == $category->id ? "selected":"") }} value="{{ $category->id }}">{{ $category->category_name }}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Sub-Category</label>
                                                <select class="form-control" name="subcategory_id">
                                                    <option value="">__Select your sub-Catgeory__</option>
                                                    @foreach($subcategories as $subcategory)

                                                        <option {{ (old("subcategory_id") == $subcategory->id ? "selected":"") }} value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Blog Title</label>
                                                <input type="text" value="{{ old('blog_title') }}" name="blog_title" class="form-control" placeholder="Enter title" >
                                            </div>

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Blog short description</label>
                                                <textarea name="blog_short_description" class="form-control" rows="3" placeholder="Enter ...">{{ old('blog_short_description') }}</textarea>
                                            </div>

                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Blog Image</label>

                                                <img src="{{ asset('backend\dist\img\avatar5.png') }}" class="avatar avatar-16 img-circle" id="output" style="height: 80px; width:80px; background-color: #0c5460;">
                                                <input type="file" value="{{ old('blog_image') }}" onchange="loadFile(event)" name="blog_image" class="form-control" >

                                            </div>

                                        </div>
                                    </div>




                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Blog long description</label>
                                                <textarea name="blog_long_description" id="summary-ckeditor" class="form-control" rows="50" placeholder="Enter ...">{{ old('blog_long_description') }}</textarea>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label>Large Thumbnail blog</label>
                                        <div class="checkbox">
                                            <label><input type="checkbox" {{ old('thumbnail') ?'checked' : '' }} name="thumbnail" value="1" class="flat-red">Thumbnail</label>
                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <label>Blog Section</label>
                                        <div class="radio">
                                            @foreach($blogSections as $blogSection)
                                            <label><input type="radio" {{ old('blog_section_id')==$blogSection->id ?'checked' : '' }} name="blog_section_id" value="{{ $blogSection->id }}" class="flat-red">{{ $blogSection->name }}</label>
                                                @endforeach

                                        </div>

                                    </div>


                                    @can('blogs.status', auth()->user())
                                    <div class="form-group">
                                        <label>Publication status</label>
                                        <div class="radio">
                                            <label><input type="radio" {{ old('publication_status')==1 ?'checked' : '' }} name="publication_status" value="1" class="flat-red">Published</label>
                                            <label><input type="radio" {{ old('publication_status')==0 ?'checked' : '' }} name="publication_status" value="0" class="flat-red">Published</label>


                                        </div>

                                    </div>
                                    @endcan

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-success">Create Post</button>
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