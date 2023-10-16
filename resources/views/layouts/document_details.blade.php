@extends('layouts.app')
@section('content')
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden  sm:rounded-lg  shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="p-6 text-gray-900">

                    <div class="flex flex-col items-center justify-center gap-5">
                        <h2 class="text-2xl font-semibold mb-4">Document Details</h2>
                        <div class="text-center">
                            <h2 class="text-xl font-regular mb-4">Document Title: <span>{{ $document->docs_title }}</span>
                            </h2>
                        </div>

                        <div class="text-center">
                            <p class="text-md font-regular">Document Details: {{ $document->docs_desc }}</p>
                        </div>

                        <div class="text-center">
                            <p class="text-md font-regular">File Name: {{ substr($document->docs_file, 11) }}</p>
                        </div>

                        @if (Auth::user()->hasRole('admin'))
                            <div class="text-center flex justify-between gap-5">
                                <a href="{{ route('docs.download', $document?->id) }}"
                                    class="flex items-center w-1/2 justify-center rounded bg-primary p-3 font-medium text-gray whitespace-nowrap">
                                    Download File
                                </a>

                                <a href="{{ route('docs.edit', $document?->id) }}"
                                    class="flex items-center w-1/2 justify-center rounded bg-primary p-3 font-medium text-gray whitespace-nowrap">
                                    Edit Document
                                </a>
                            </div>
                        @else
                            <div class="text-center flex justify-center">
                                <a href="{{ route('docs.download', $document?->id) }}"
                                    class="flex items-center  justify-center rounded bg-primary p-3 font-medium text-gray whitespace-nowrap">
                                    Download File
                                </a>


                            </div>
                        @endif



                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
