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
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <!-- /.box -->

                    <div class="box">
                        <div class="box-header">
                            <section class="content-header">
                                <h1>
                                    Manage Admin Permission-For
                                </h1>
                                <ol class="breadcrumb">
                                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                                    <li><a href="#">Tables</a></li>
                                    <li class="active">Role tables</li>
                                </ol>
                            </section>


                            @include('Backend.errors.errors')

                            <a href="{{ route('permission-for.create') }}" class="btn btn-success pull-right">Add Permission-for</a>


                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Sl No:</th>
                                    <th>Permission for name</th>
                                    <th>Action Method</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($permissions_for as $permission_for)

                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $permission_for->name }}</td>
                                        <td>
                                            <a href="{{ route('permission-for.show', $permission_for->id) }}" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit"></span></a>
                                            <a href="{{ route('permission-for.destroy', $permission_for->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
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


