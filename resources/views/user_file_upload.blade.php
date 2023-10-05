<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('File Manage') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
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
                    <h2 class="text-2xl font-semibold mb-4">Upload File</h2>
                    <form action="{{ route('docs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-medium">Document Title</label>
                            <input type="text" id="name" name="docs_title" class="w-full px-4 py-2 rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                        </div>

                        <div class="mb-4">
                            <label for="message" class="block text-gray-700 font-medium">Document Description</label>
                            <textarea id="message" name="docs_desc" rows="4" class="w-full px-4 py-2 rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200" required></textarea>
                        </div>

                        <div class="mb-6">
                            <label for="file" class="block text-gray-700 font-medium">Upload File</label>
                            <input type="file" id="file" name="docs_file" class="w-full px-4 py-2 rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                        </div>
                        <div>
                            <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
