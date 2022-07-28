<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrivacyAndPolicy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrivacyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view privacy-policy');

        $privacy_policies = PrivacyAndPolicy::where('store_id', User::find(Auth::id())->store->id)->get();
        return view('backend.cms.privacy_policy.index', compact('privacy_policies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create privacy-policy');

        return view('backend.cms.privacy_policy.create');
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

        $privacy_policy = new PrivacyAndPolicy();
        $privacy_policy->title = $request->title;
        $privacy_policy->description = $request->description;
        $privacy_policy->store_id = User::with('store')->find(Auth::id())->store->id;
        $privacy_policy->save();
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
        $this->authorize('edit privacy-policy');

        $privacy_policy = PrivacyAndPolicy::find($id);
        return view('backend.cms.privacy_policy.edit', compact('privacy_policy'));
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

        $privacy_policy = PrivacyAndPolicy::find($id);
        $privacy_policy->title = $request->title;
        $privacy_policy->description = $request->description;
        $privacy_policy->update();
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
