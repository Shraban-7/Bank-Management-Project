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
                                                <form role="form" method="POST" action="{{ route('user.store') }}">
                                                    @csrf
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label>Username </label>
                                                            <input type="text" name="name" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>User Email </label>
                                                            <input type="email" name="email" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>User Phone number </label>
                                                            <input type="text" name="ph_no" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>User Address </label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea3" name="address" rows="7"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Select Department</label>
                                                            <select class="form-control" name="dept_id" id="exampleFormControlSelect1">
                                                                <option selected value="">---select---</option>

                                                                @foreach ($departments as $department)
                                                                <option  value="{{ $department->id }}">{{ $department->dept_name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Select Role</label>
                                                            <select class="form-control" name="role_name" id="exampleFormControlSelect1">
                                                                <option selected value="">---select---</option>
                                                                @foreach ($roles as $role)
                                                                <option  value="{{ $role->name }}">{{ $role->name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Status select</label>
                                                            <select class="form-control" name="user_status" id="exampleFormControlSelect1">
                                                                <option selected value="active">Active</option>
                                                                <option value="inactive">InActive</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Password </label>
                                                            <input type="password" name="password" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Confirm Password</label>
                                                            <input type="password" name="password_confirmation" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div id="file-name-preview"></div>
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
            </div>
                <!-- /.card -->
        </section>

        <!-- right col -->
    </div>
    <!-- /.row (main row) -->
</div>



@endsection
