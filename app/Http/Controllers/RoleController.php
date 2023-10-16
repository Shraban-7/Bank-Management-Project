<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission=Permission::all();
        $roles = Role::with('permissions')->paginate(10);
        // return $roles;
        return view('layouts.role_list', compact('roles','permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',

        ]);

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);
        // $role->syncPermissions($request->input('permission'));

        return redirect()->back()->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission=Permission::all();
        $role = Role::with('permissions')->where('id',$id)->first();

        // foreach($role->permissions as $per)
        // {

        // }

        return view('layouts.role_edit', compact('role','permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request, [

        ]);

        $role->update([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);
        // $role->syncPermissions($request->input('permission'));

        return redirect()->route('role.create')->with('success', 'Role update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('role.create');
    }
}
