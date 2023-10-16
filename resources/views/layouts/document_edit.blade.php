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
                    <form action="{{ route('docs.update',$document->id) }}" method="POST" enctype="multipart/form-data">
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

                        <div class="mb-4.5">
                            <label class="mb-2.5 block text-black dark:text-white">
                                Select Category
                            </label>
                            <div class="relative z-20 bg-transparent dark:bg-form-input">
                                <select
                                    name="category_id" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                    <option selected value="">Select File Category</option>
                                    @foreach ($categories as $category)
                                        <option @if ($document_category==$category->id)
                                            selected
                                        @endif value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                <span class="absolute top-1/2 right-4 z-30 -translate-y-1/2">
                                    <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.8">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                                fill=""></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
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
