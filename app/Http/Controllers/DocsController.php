<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dept;
use App\Models\Docs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $documents_query = Docs::with('user.dept', 'category');
        // return $documents_query->get();
        if (request()->file_title) {
            $documents_query->where('docs_title', 'LIKE', '%' . request()->file_title . '%');
        }
        if (request()->file_uploader) {
            $documents_query->where('user_id', request()->file_uploader);
        }
        if (request()->category_id) {
            $documents_query->where('category_id', request()->category_id);
        }

        if (request()->dept_id) {
            // return request()->dept_id;
            $documents_query->whereHas('user', function ($query) {
                $query->whereHas('dept', function($query) {
                    $query->where('id', request()->dept_id);
                });
            });
        }
        $documents = $documents_query->paginate(50);

        $users = User::all();
        $departments = Dept::all();
        // return $documents;
        return view('layouts.admin_document_list', compact('documents', 'categories', 'users', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.documents.create');

    }

    public function list_documents()
    {
        $categories = Category::all();
        $documents_query = Docs::withWhereHas('user.dept', function ($query) {
            $query->where('id', Auth::user()->dept_id);
        });
        if (request()->file_title) {
            $documents_query->where('docs_title', 'LIKE', '%' . request()->file_title . '%');
        }
        if (request()->file_uploader) {
            $documents_query->where('user_id', request()->file_uploader);
        }
        if (request()->category_id) {
            $documents_query->where('category_id', request()->category_id);
        }

        $documents = $documents_query->paginate(50);
        $users = User::all();
        // return $documents;
        return view('layouts.document_list', compact('documents', 'categories', 'users'));

    }
    public function my_documents()
    {
        $documents = Docs::where('user_id', Auth::user()->id)->paginate(50);

        // return $documents;
        return view('layouts.document_list', compact('documents'));

    }

    public function createByUser()
    {

        $categories = Category::all();
        return view('layouts.user_file_upload', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data, including the file upload
        $request->validate([
            'docs_title' => 'required',
            'docs_desc' => 'required',
            'docs_file' => 'required', // Adjust file validation rules as needed
        ]);

        // return Auth::user()->id;

        // return $request->all();

        // Handle file upload
        $fileName = "";
        if ($request->hasFile('docs_file')) {
            $file = $request->file('docs_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            // Store the file in the storage/app/public directory
            $file->storeAs('public/upload', $fileName);
        }

        // return Auth::user()->getRoleNames()->first();

        // Create a new document record
        Docs::create([
            'docs_title' => $request->input('docs_title'),
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'docs_desc' => $request->input('docs_desc'),
            'docs_file' => $fileName, // Store the file name in the database
        ]);
        if (Auth::user()->getRoleNames()->first() === 'super-admin' || Auth::user()->getRoleNames()->first() === 'admin') {
            return redirect()->route('docs.list')->with('success', 'Document created successfully.');
        } else {
            return redirect()->route('profile')->with('success', 'Document created successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Docs $document)
    {
        return view('layouts.document_details', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Docs $document)
    {
        $categories = Category::all();
        $document_category = $document->category->id;
        // return $document_category;
        return view('layouts.document_edit', compact('document', 'document_category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Docs $document)
    {
        // Validate the request data, including the file upload
        $request->validate([
            'docs_title' => 'required',
            'docs_desc' => 'required',
            // 'docs_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Adjust file validation rules as needed
        ]);

        $fileName = ""; // Initialize fileName variable

        if ($request->hasFile('docs_file')) {
            $file = $request->file('docs_file');
            $fileName = time() . '_' . $file->getClientOriginalName();

            $file->storeAs('public/upload', $fileName);

            // Check if $document is the existing document to be updated
            if ($document) {
                // Delete the old file if it exists
                if ($document->docs_file) {
                    Storage::delete('public/upload/' . $document->docs_file);
                }

                // Update the document's file name in the database
                $document->update(['docs_file' => $fileName]);
            }
        } else {
            $fileName = $document->docs_file; // Use the existing file name
        }

// Rest of your code to save or update the document in the database

        // return $request->all();
        // Update the document
        $document->update([
            'docs_title' => $request->input('docs_title'),
            'docs_desc' => $request->input('docs_desc'),
            'docs_file' => $fileName,
        ]);

        return redirect()->back()->with('success', 'Document updated successfully.');
    }

    public function download(Docs $document)
    {
        $path = public_path('storage/upload/' . $document->docs_file);

        // return $path;

        if (!file_exists($path)) {
            return redirect()->back()->with('error', 'File does not exist!');
        }
        return response()->download($path);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Docs $document)
    {
        if ($document->docs_file) {
            Storage::delete('public/upload/' . $document->docs_file);
        }

        $document->delete();
        if (Auth::user()->getRoleNames()->first() === 'super-admin' || Auth::user()->getRoleNames()->first() === 'admin') {
            return redirect()->route('docs.list')->with('success', 'Document deleted successfully.');
        } else {
            return redirect()->route('profile');
        }

    }
}
