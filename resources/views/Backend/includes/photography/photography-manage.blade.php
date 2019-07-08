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
                                    Manage Your Photography
                                </h1>
                                <ol class="breadcrumb">
                                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                                    <li><a href="#">Tables</a></li>
                                    <li class="active">Photography tables</li>
                                </ol>
                            </section>
                            @include('Backend.errors.errors')


                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Sl No:</th>
                                    <th>Carousel image</th>
                                    <th>Publication status</th>
                                    <th> Action Method</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($photos as $photo)

                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td><img src="{{ asset($photo->photography_image_path) }}" width="400px" height="200px"></td>

                                        @if($photo->publication_status ==1)
                                        <td><h4 style="background-color: #2c4359; color: white" class="text-center">Published</h4></td>
                                        @elseif($photo->publication_status ==0)
                                            <td><h4 style="background-color: red; color: black" class="text-center">Unpublished</h4></td>
                                        @endif


                                            <td>
                                            @if($photo->publication_status==0)
                                                <a href="{{ route('photography.published', $photo->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-arrow-down"></span></a>
                                            @else
                                                <a href="{{ route('photography.unpublished', $photo->id) }}" class="btn btn-xs btn-bitbucket"><span class="glyphicon glyphicon-arrow-up"></span></a>
                                            @endif

                                            <a href="{{ route('photography.trash', $photo->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                        </td>

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
