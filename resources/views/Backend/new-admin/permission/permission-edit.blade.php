@extends('Backend.layouts.master')

@section('content')


    <div class="content-wrapper">

        <section class="content" style="padding-top: 10px;background-color: #9f191f">
            <div class="row">



                <div class="col-sm-offset-2 col-md-8" style="padding-top: 99px;">


                    <div class="panel">
                        <div class="panel-header">
                            <h2 class="text-center" style="background-color: #9f191f; color: white;"> Edit Admin Permission</h2>
                        </div>



                        <div class="panel-body">




                            <!-- /.box-header -->
                            <div class="">
                                <form role="form" action="{{ route('permission.update', $permission->id) }}" method="post" id="permission_for_selected">
                                @csrf
                                    @method('PUT')


                                @include('Backend.errors.errors')

                                <!-- text input -->
                                    <div class="form-group">
                                        <label>Permission name</label>
                                        <input value="{{ $permission->name }}" type="text" name="name" class="form-control" placeholder="Enter permission-   Post.create" >
                                    </div>

                                    <div class="form-group">
                                        <label>Permission for</label>

                                        <select class="form-control" id="for_id" name="permission_for_id">
                                            @foreach($permissions_for as $permission_for)
                                                <option value="{{ $permission_for->id }}">{{ $permission_for->name }}</option>

                                            @endforeach

                                        </select>

                                    </div>



                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-success">Update Permission</button>
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

<script>

    document.forms['permission_for_selected'].elements['permission_for_id'].value='{{ $permission->for_id }}'

</script>
