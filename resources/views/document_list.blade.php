<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('File Manage') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="table">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>File Title</th>
                                <th>File Description</th>
                                <th>File DownLoad</th>
                                <th>Department Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row 1 -->
                            @php
                            $count = 1; // Initialize the count variable
                            @endphp
                            @foreach ($documents as $document)

                            <tr>
                                <th>{{ $count }}</th>
                                <td>{{ $document->docs_title }}</td>
                                <td>{{ $document->docs_desc }}</td>
                                <td>
                                    <a href="{{ route('docs.download',$document->id) }}" class="btn btn-primary">Download</a>
                                </td>
                                <td>
                                    {{ $document?->user?->dept?->dept_name }}
                                </td>
                            </tr>

                            @php
                            $count++; // Increment the count variable for each iteration
                            @endphp
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
