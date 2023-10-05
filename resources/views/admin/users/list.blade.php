@extends('admin.master')
@section('title', 'Brand List')
@section('meta_keywords', 'DesignWavers')
@section('meta_description', 'DesignWavers')
@section('content')

{{-- <style>
    input[type=search]{
        padding: 10px !important;
    }

    #Table_ID_length>label{
        /* display: flex !important; */
        /* justify-content: space-between !important; */
    }

    #Table_ID_filter>label{
        display: flex !important;
    }
    /* #Table_ID_filter{
        display: flex !important;
        justify-items: end !important;
    } */

    .paginate_button.page-item.active{
        /* margin: 0 !important; */
        /* padding: 0 !important; */
        background: #fff !important;
        border: none !important;
    }
</style> --}}
    @if ($message = Session::get('alert'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="wrapper">
        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">User List</h1>
                        </div><!-- /.col -->
                        <!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <section class="col-lg-12  connectedSortable">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h1 class="card-title col-lg-12">User List</h1>

                                </div>
                                <div class="card-body">
                                    <table id="Table_ID" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Department Name</th>
                                                <th scope="col">Role</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td class="text-center">{{ $user->name }}</td>
                                                    <td class="text-center">{{ $user->email }}</td>
                                                    <td class="text-center">{{ $user->ph_no }}</td>
                                                    <td class="text-center">{{ $user->address }}</td>
                                                    <td class="text-center">{{ $user?->dept?->dept_name }}</td>
                                                    <td class="text-center">{{ $user?->getRoleNames()?->first() }}</td>
                                                    <td class="text-center">{{ $user->user_status }}</td>
                                                    <td class="text-center">
                                                        <a class="btn btn-danger m-2"
                                                            href="{{ route('user.delete', $user->id) }}"><i
                                                                class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    {{-- <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $('#Table_ID').DataTable();
        });
    </script>
@endsection
