@extends('layouts.app')

@section('content')

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden  sm:rounded-lg  shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="p-6 text-gray-900">
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
                    <h2 class="text-2xl font-semibold mb-4">Update Department</h2>
                    <form action="{{ route('department.update',$department->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="name"
                                class="mb-3 text-gray-700 block font-medium  text-black dark:text-white">Department
                                Name</label>
                            <input type="text" id="name" value="{{ $department->dept_name }}" name="dept_name"
                                class="w-full px-4 py-2  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                               >
                        </div>


                        <div>
                            <button type="submit"
                                class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
