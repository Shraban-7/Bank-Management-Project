@extends('admin.master')
@section('title', 'Brand List')
@section('meta_keywords', 'DesignWavers')
@section('meta_description', 'DesignWavers')

@section('content')


@if ($message = Session::get('alert'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="wrapper">



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- /.row -->
                <!-- Main row -->
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
                                            <th class="text-center" scope="col">Document Title</th>
                                            <th class="text-center" scope="col">Document Desc</th>
                                            <th class="text-center" scope="col">Document File</th>
                                            <th class="text-center" scope="col">Department Name</th>
                                            <th class="text-center" scope="col">Download File</th>
                                            <th class="text-center" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($documents as $document)
                                <tr>
                                    <td class="text-center">{{ $document->docs_title }}</td>
                                    <td class="text-center">
                                        {{ $document->docs_desc }}
                                    </td>
                                    <td class="text-center">
                                        {{ $document->docs_file }}
                                    </td>
                                    <td class="text-center">
                                        {{ $document?->user?->dept?->dept_name }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('docs.download',$document->id) }}" class="btn btn-primary pull-right"><i class="icon-download-alt"> </i> Download  </a>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-success" href="{{ route('docs.edit', $document->id) }}"><i class="fas fa-edit"></i></a>

                                        <a class="btn btn-danger m-2"
                                            href="{{ route('docs.delete', $document->id) }}"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center" scope="col">Document Title</th>
                                            <th class="text-center" scope="col">Document Desc</th>
                                            <th class="text-center" scope="col">Document File</th>
                                            <th class="text-center" scope="col">Download File</th>
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

<!-- /.row -->


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
{{-- <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> --}}
<script>
    $(document).ready(function() {
        $('#Table_ID').DataTable();
    });
</script>
@endsection
