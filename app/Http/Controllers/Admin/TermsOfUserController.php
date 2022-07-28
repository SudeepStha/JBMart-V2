<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Terms_of_User;
use App\Models\TermsOfUse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TermsOfUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view terms');

        $termsofusers = Terms_of_User::where('store_id', User::with('store')->find(Auth::id())->store->id)->get();
        return view('backend.cms.termsofUser.index', compact('termsofusers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create terms');

        return view('backend.cms.termsofUser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $termsofuser = new Terms_of_User();
        $termsofuser->title = $request->title;
        $termsofuser->description = $request->description;
        $termsofuser->store_id = User::with('store')->find(Auth::id())->store->id;
        $termsofuser->save();
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
        $this->authorize('edit terms');

        $termsofuser = Terms_of_User::find($id);
        return view('backend.cms.termsofUser.edit', compact('termsofuser'));
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
        $date = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $termsofuser = Terms_of_User::find($id);
        $termsofuser->title = $request->title;
        $termsofuser->description = $request->description;
        $termsofuser->update();
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
