@extends('admin.master')
@section('title', 'Add Brand')
@section('meta_keywords', 'DesignWavers')
@section('meta_description', 'DesignWavers')

@section('content')
<div class="wrapper">



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12 connectedSortable">

                        <div class="card">
                            <div class="card-header d-flex">
                                <h3 class="box-title col-md-6">Create Document</h3>
                                                    <div class="col-md-3"></div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <section class="content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box box-primary">

                                                <!-- /.box-header -->
                                                <!-- form start -->
                                                @if($errors->any())
                                                    <div class="alert alert-danger">
                                                        <p><strong>Opps Something went wrong</strong></p>
                                                        <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <form role="form" method="POST" action="{{ route('permission.store') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label>Permission Name</label>
                                                            <input type="text" name="name" class="form-control">
                                                        </div>
                                                    </div>
                                                    <!-- /.box-body -->
                                                    <div class="box-footer mt-2">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </section>
                    <!-- /.card-body -->
                </div>
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12 connectedSortable">

                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title col-lg-4">Brand List</h3>
                                <div class="col-lg-5"></div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="Table_ID" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center" scope="col">Permission Name</th>

                                            <th class="text-center" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permissions as $permission)
                                <tr>
                                    <td class="text-center">{{ $permission->name }}</td>

                                    <td class="text-center">
                                        <a class="btn btn-success" href="{{ route('permission.edit', $permission->id) }}"><i class="fas fa-edit"></i></a>

                                        <a class="btn btn-danger m-2"
                                            href="{{ route('permission.delete', $permission->id) }}"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center" scope="col">Department Name</th>

                                            <th class="text-center" scope="col">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                    </section>
                    <!-- /.card-body -->
                </div>

            </div>
                <!-- /.card -->
        </section>

        <!-- right col -->
    </div>
    <!-- /.row (main row) -->
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
{{-- <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> --}}
<script>
    $(document).ready(function() {
        $('#Table_ID').DataTable();
    });
</script>

@endsection
