<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReturnPolicy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReturnPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view return-policy');

        $return_policies = ReturnPolicy::where('store_id', User::find(Auth::id())->store->id)->get();
        return view('backend.cms.returnofuser.index', compact('return_policies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create return-policy');

        return view('backend.cms.returnofuser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $return_policy = new ReturnPolicy();
        $return_policy->title = $request->title;
        $return_policy->description = $request->description;
        $return_policy->store_id = User::with('store')->find(Auth::id())->store->id;
        $return_policy->save();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('edit return-policy');

        $return_policy = ReturnPolicy::find($id);
        return view('backend.cms.returnofuser.edit', compact('return_policy'));
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
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $return_policy = ReturnPolicy::find($id);
        $return_policy->title = $request->title;
        $return_policy->description = $request->description;
        $return_policy->update();
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
        //
    }
}
