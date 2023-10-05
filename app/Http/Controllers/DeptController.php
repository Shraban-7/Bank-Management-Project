<?php

namespace App\Http\Controllers;

use App\Models\Dept;
use Illuminate\Http\Request;

class DeptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Dept::all();
        return view('admin.dept.list',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dept.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dept_name'=>'required'
        ]);

        Dept::create($request->all());
        return redirect()->back()->with('success','department create successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dept $dept)
    {
        return view('admin.dept.edit',compact('dept'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dept $dept)
    {
        return view('admin.dept.edit',compact('dept'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dept $dept)
    {
        $request->validate([
            'dept_name'=>'required'
        ]);

        $dept->update([
            'dept_name'=>$request->dept_name,
        ]);

        return redirect()->back()->with('success','department create successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dept $dept)
    {
        $dept->delete();
        return redirect()->route('department.list');
    }
}
