<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $categories_query=Category::all();

    //     if (request()->category_name) {
    //         $categories_query->where('category_name	', 'LIKE','%'.request()->category_name.'%');
    //     }

    //     $categories=$categories_query->paginate(10);
    //     return view('layouts.category_list',compact('categories'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories_query=Category::query();

        if (request()->category_name) {
            $categories_query->where('category_name', 'LIKE','%'.request()->category_name.'%');
        }

        $categories=$categories_query->paginate(10);
        return view('layouts.category_create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name'=>'required'
        ]);

        Category::create([
            'category_name'=>$request->category_name
        ]);

        return redirect()->back()->with('success','category create successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('layouts.category_edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name'=>'required'
        ]);

        $category->update([
            'category_name'=>$request->category_name
        ]);

        return redirect()->route('category.create')->with('success','category update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.create');
    }
}
