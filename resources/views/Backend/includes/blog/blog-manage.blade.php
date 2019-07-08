@extends('Backend.layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('/') }}backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection
@section('js')


    <script src="{{ asset('/') }}backend/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}backend/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>



    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection

@section('content')

    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <!-- /.box -->

                    <div class="box">
                        <div class="box-header">

                            <section class="content-header">
                                <h1>
                                    Manage Your Blog
                                </h1>
                                <ol class="breadcrumb">
                                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                                    <li><a href="#">Tables</a></li>
                                    <li class="active">Blog tables</li>
                                </ol>
                            </section>


                            @include('Backend.errors.errors')
                            @can('blogs.create', auth()->user())
                            <a href="{{ route('blog.create') }}" class="btn btn-success pull-right" >Add new</a>
                                @endcan
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Sl No:</th>
                                    <th>Admin</th>
                                    <th>Category</th>
                                    <th>Sub-category</th>
                                    <th>Title</th>
                                    <th>Photo</th>
                                    <th>Author</th>
                                    @can('blogs.viewAny', auth()->user())
                                    <th>Action Method</th>
                                        @endcan
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($blogs as $blog)

                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $blog->admin->name }}</td>
                                        <td>{{ $blog->category->category_name }}</td>
                                        <td>{{ $blog->sub_category->subcategory_name }}</td>
                                        <td>{{ $blog->blog_title }}</td>
                                        <td><img src="{{ $blog->getFirstMediaUrl('blog') }}" width="100px" height="40px"></td>

                                        <td>{{ $blog->publication_status ==1 ? 'Published' :'Unpublished' }}</td>
                                        @can('blogs.viewAny', auth()->user())
                                        <td>
                                            @can('blogs.publication_status', auth()->user())
                                            @if($blog->publication_status==0)
                                                <a href="{{ route('blog.published', $blog->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-arrow-down"></span></a>
                                            @else
                                                <a href="{{ route('blog.unpublished', $blog->id) }}" class="btn btn-xs btn-bitbucket"><span class="glyphicon glyphicon-arrow-up"></span></a>
                                            @endif
                                            @endcan


                                            @can('blogs.view', auth()->user())
                                            <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit"></span></a>
                                            @endcan

                                            @can('blogs.delete', auth()->user())
                                             <a href="{{ route('blog.trash', $blog->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                            @endcan
                                        </td>
                                            @endcan

                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

@endsection


