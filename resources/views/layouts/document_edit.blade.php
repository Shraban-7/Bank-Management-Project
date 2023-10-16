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
                    <h2 class="text-2xl font-semibold mb-4">Upload File</h2>
                    <form action="{{ route('docs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="name"
                                class="mb-3 text-gray-700 block font-medium  text-black dark:text-white">Document
                                Title</label>
                            <input type="text" id="name" value="{{ $document->docs_title }}" name="docs_title"
                                class="w-full px-4 py-2  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="message"
                                class="block text-gray-700 font-medium text-black dark:text-white">Document
                                Description</label>
                            <textarea id="message" name="docs_desc" rows="4"
                                class="w-full px-4 py-2 rounded border border-gray-300  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                required>{{ $document->docs_desc }}</textarea>
                        </div>
                        <div>
                            <p class="text-md font-regular">File Name: {{ substr($document->docs_file, 11) }}</p>
                        </div>
                        <div class="mb-6">
                            <label for="file" class="block text-gray-700 font-medium text-black dark:text-white">Upload
                                File</label>
                            <input type="file" id="file" value="{{ $document->docs_file }}" 
                                name="docs_file"
                                class="w-full px-4 py-2 border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                        </div>
                        <div>
                            <div id="file-name-preview"></div>
                        </div>
                        <div>
                            <button class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
