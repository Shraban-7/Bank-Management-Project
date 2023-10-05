<?php

namespace App\Http\Controllers;

use App\Models\Docs;
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
        $documents = Docs::with('user.dept')->get();
        // return $documents;
        return view('admin.documents.list', compact('documents'));
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
        $documents = Docs::withWhereHas('user.dept', function ($query) {
            $query->where('id', Auth::user()->dept_id);
        })->get();
        // return $documents;
        return view('document_list', compact('documents'));

    }

    public function createByUser()
    {
        return view('user_file_upload');
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
            'docs_file' => 'required|file|mimes:pdf,doc,docx|max:2048', // Adjust file validation rules as needed
        ]);

        // return Auth::user()->id;


        // return $request->all();


        // Handle file upload
        $fileName="";
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
            'user_id'=>Auth::user()->id,
            'docs_desc' => $request->input('docs_desc'),
            'docs_file' => $fileName, // Store the file name in the database
        ]);
        if(Auth::user()->getRoleNames()->first()==='super-admin'||Auth::user()->getRoleNames()->first()==='admin')
        {
            return redirect()->route('docs.list')->with('success', 'Document created successfully.');
        }else{
            return redirect()->route('dashboard');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Docs $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Docs $document)
    {
        return view('admin.documents.edit', compact('document'));
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
            'docs_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Adjust file validation rules as needed
        ]);

        // Handle file upload if a new file is provided
        $fileName="";
        if ($request->hasFile('docs_file')) {
            $file = $request->file('docs_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            // Store the file in the storage/app/public directory
            $file->storeAs('public/upload', $fileName);

            // Delete the old file if it exists



            if ($document->docs_file) {
                Storage::delete('public/upload/' . $document->docs_file);
            }
            // Update the file name in the database

        }else {
            // No new file provided, retain the previous file
            $fileName = $document->docs_file;
        }

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

        return redirect()->route('docs.list')->with('success', 'Document deleted successfully.');
    }
}
