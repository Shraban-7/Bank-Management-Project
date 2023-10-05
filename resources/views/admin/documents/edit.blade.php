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
                                <h3 class="box-title col-md-6">Edit Document</h3>
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
                                                <form role="form" method="POST" action="{{ route('docs.update',$document) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label>Document Title </label>
                                                            <input type="text" name="docs_title" class="form-control" value="{{ $document->docs_title }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Document Description </label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea3" name="docs_desc" rows="7">{{ $document->docs_desc }}</textarea>
                                                        </div>
                                                        <div class="m-3">
                                                            <p><strong>Old file: </strong>{{ $document->docs_file }}</p>
                                                        </div>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                              <input type="file" name="docs_file" class="custom-file-input" value="{{ $document->docs_file }}" id="exampleInputFile">
                                                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                            </div>
                                                            <div class="input-group-append">
                                                              <span class="input-group-text">Upload</span>
                                                            </div>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  // Listen for changes in the file input
  $('#exampleInputFile').change(function() {
    // Get the selected file name
    var fileName = $(this).val().split('\\').pop();

    // Display the file name in the preview element
    $('#file-name-preview').text(fileName);
  });
});
</script>
@endsection
