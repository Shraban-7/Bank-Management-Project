<?php

namespace App\Http\Controllers;

use App\Models\Dept;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DeptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments_query =  Dept::query();

        if (request()->department_name) {
            $departments_query->where('dept_name', 'LIKE','%'.request()->department_name.'%');
        }

        $departments=$departments_query->paginate(10);
        return view('layouts.department_list',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.department_create');
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

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dept $department)
    {
        return view('layouts.department_edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dept $department)
    {
        $request->validate([
            'dept_name'=>'required'
        ]);

        $department->update([
            'dept_name'=>$request->dept_name,
        ]);

        return redirect()->route('department.list')->with('success','department update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dept $department)
    {
        $department->delete();
        return redirect()->route('department.list');
    }
}
