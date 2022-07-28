<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShippingPolicy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippingPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view shipping-policy');

        $shipping_policies = ShippingPolicy::where('store_id', User::with('store')->find(Auth::id())->store->id)->get();
        return view('backend.cms.shipping_policy.index', compact('shipping_policies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create shipping-policy');

        return view('backend.cms.shipping_policy.create');
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
        $shipping_policy = new ShippingPolicy();
        $shipping_policy->title = $request->title;
        $shipping_policy->description = $request->description;
        $shipping_policy->store_id = User::with('store')->find(Auth::id())->store->id;
        $shipping_policy->save();
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
        $this->authorize('edit shipping-policy');

        $shipping_policy = ShippingPolicy::find($id);
        return view('backend.cms.shipping_policy.edit', compact('shipping_policy'));
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
        $shipping_policy = ShippingPolicy::find($id);
        $shipping_policy->title = $request->title;
        $shipping_policy->description = $request->description;
        $shipping_policy->update();
        $request->session()->flash('message', 'Record Update');
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
