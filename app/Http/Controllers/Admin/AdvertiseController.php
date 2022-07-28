<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;

class AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->authorize('view ad');
        $ads = Ad::where('user_id', auth()->user()->id)->get();
        return view('backend.ad.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create ad');
        return view('backend.ad.create');
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
            'ad_name' => 'required',
            'expire_date' => 'required',
            'image' => 'required',
            'ad_run' => 'required'
        ]);

        $ad = new Ad();
        $ad->ad_name = $request->ad_name;
        $ad->url = $request->url;
        $ad->run_ad_for = $request->ad_run;
        $ad->expire_date = $request->expire_date;
        if ($request->hasFile('image')) {
            $filename = $request->image;
            $newname = time() . '.' . $filename->extension();
            $filename->move('images', $newname);
            $ad->image = 'images/' . $newname;
        } else {
            $ad->image = asset('icon/icon.png');
        }
        $ad->user_id = auth()->user()->id;
        $ad->save();
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
        // $this->authorize('edit ad');
        $ad = Ad::find($id);
        return view('backend.ad.edit', compact('ad'));
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
        $ad = Ad::find($id);
        $ad->ad_name = $request->ad_name;
        $ad->url = $request->url;
        $ad->run_ad_for = $request->ad_run;
        $ad->expire_date = $request->expire_date;
        if ($request->hasFile('image')) {
            $filename = $request->image;
            $newname = time() . '.' . $filename->extension();
            $filename->move('images', $newname);
            $ad->image = 'images/' . $newname;
        } else {
            $ad->image = asset('icon/icon.png');
        }
        $ad->update();
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
