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
                                                    @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <p><strong>Opps Something went wrong</strong></p>
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                    <form role="form" method="POST" action="{{ route('role.store') }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label>Role Name</label>
                                                                <input type="text" name="name" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Select multiple options:</label>
                                                                {{-- <select class="form-control" multiple id="select2Multiple"
                                                                    name="permission" multiple="multiple">
                                                                    @foreach ($permission as $per)
                                                                        <option value="{{ $per->id }}">
                                                                            {{ $per->name }}</option>
                                                                    @endforeach

                                                                    <!-- Add more options as needed -->
                                                                </select> --}}
                                                                @foreach ($permission as $per)
                                                                    {{-- <option value="{{ $per->id }}">
                                                                        {{ $per->name }}</option> --}}
                                                                    <div>
                                                                        <input type="checkbox" value="{{ $per->id }}" name="permission[]"
                                                                            id="">
                                                                            <label for="">{{ $per->name }}</label>
                                                                    </div>
                                                                @endforeach
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
                                    <h3 class="card-title col-lg-4">Role List</h3>
                                    <div class="col-lg-5"></div>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center" scope="col">Role Name</th>
                                                <th class="text-center" scope="col">Role Permission</th>
                                                <th class="text-center" scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($roles as $role)
                                                <tr>
                                                    <td class="text-center">{{ $role?->name }}</td>



                                                    <td class="text-center">
                                                        <ul>
                                                            @foreach ($role?->permissions as $permission)
                                                                <li>{{ $permission->name }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </td>

                                                    <td class="text-center">
                                                        <a class="btn btn-success"
                                                            href="{{ route('role.edit', $role->id) }}"><i
                                                                class="fas fa-edit"></i></a>

                                                        <a class="btn btn-danger m-2"
                                                            href="{{ route('role.delete', $role->id) }}"><i
                                                                class="fas fa-trash-alt"></i></a>
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
    <script>
        (function($) {

            "use strict";


            $(".js-select2").select2({
                closeOnSelect: false,
                placeholder: "Click to select an option",
                allowHtml: true,
                allowClear: true,
                tags: true // создает новые опции на лету
            });

            $('.icons_select2').select2({
                width: "100%",
                templateSelection: iformat,
                templateResult: iformat,
                allowHtml: true,
                placeholder: "Click to select an option",
                dropdownParent: $('.select-icon'), //обавили класс
                allowClear: true,
                multiple: false
            });


            function iformat(icon, badge, ) {
                var originalOption = icon.element;
                var originalOptionBadge = $(originalOption).data('badge');

                return $('<span><i class="fa ' + $(originalOption).data('icon') + '"></i> ' + icon.text +
                    '<span class="badge">' + originalOptionBadge + '</span></span>');
            }

        })(jQuery);

        $(document).ready(function() {
            $('#Table_ID').DataTable();
        });
    </script>


@endsection
