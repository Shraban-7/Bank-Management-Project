<?php

namespace App\Http\Controllers;
use App\Models\Dept;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Arr;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users= User::with('dept')->paginate(5);

        $users_query= User::with('dept');

        // $user_roles= User::with('roles')->get();

        // $roles = $users?->getRoleNames()->get();

        // return $roles;

        // return $users;


        if (request()->user_name) {
            $users_query->where('name', 'LIKE','%'.request()->user_name.'%');
        }

        $users=$users_query->paginate(50);

        return view('layouts.user_list',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Dept::all();
        // return $departments->all();
        $roles = Role::get();
        return view('layouts.user_create_by_admin',compact('departments','roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'ph_no' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // return $request->all();

        $user = User::create([
            'dept_id'=>$request->dept_id,
            'name' => $request->name,
            'email' => $request->email,
            'ph_no' => $request->ph_no,
            'address'=>$request->address,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role_name);




        //$user->save();

        // event(new Registered($user));

        //Auth::login($user);

        return redirect()->route('user.list')->with('success', 'User Created Successfully!');
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
    public function edit(User $user)
    {
        $departments = Dept::all();
        // return $departments->all();
        $roles = Role::get();
        return view('layouts.user_role_update',compact('user','departments','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {


        // return $request->all();
        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user=User::find($id);

        $user->update($input);

        DB::table('model_has_roles')->where('model_id',$id)->delete();


        $user->assignRole($request->role_name);
        // $user->assignRole($request->input('roles'));

        return redirect()->route('user.list')->with('success', 'User Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.list');
    }
}
