<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view user');
        $accounts = User::all();
        return view('backend.account.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create user');
        $roles = Role::all();
        $permissions = Permission::all();
        return view('backend.account.create', compact('roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create user');

        $data = $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'password' => 'required | confirmed',
            'role' => 'array'
        ]);

        $account = new User();
        $account->name = $request->name;
        $account->mobile = $request->mobile;
        $account->email = $request->email;
        $account->password = Hash::make($request->password);
        $account->save();
        if(Auth::user()->can('manage role')){
            $account->syncRoles($request->role);
        }else{
            if(in_array(1,$request->role)){
                $account->assignRole('Admin');
            }
            if(in_array(0,$request->role)){
                $account->assignRole('Seller');
            }
        }
        // $account->syncPermissions($request->permisison);
        $request->session()->flash('message', 'Record Saved');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('edit user');
        $roles = Role::all();
        $account = User::find($id);
        return view('backend.account.edit', compact('roles', 'account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('edit user');
        $data = $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
        ]);

        $account = User::find($id);
        $account->name = $request->name;
        $account->mobile = $request->mobile;
        $account->email = $request->email;
        // $account->password = Hash::make($request->password);
        $account->update();
        $account->syncRoles($request->role);
        // $account->syncPermissions($request->permisison);
        $request->session()->flash('message', 'Record Updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
