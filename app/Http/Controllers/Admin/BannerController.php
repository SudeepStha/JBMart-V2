<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerSlider;
use App\Models\User;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->authorize('view banner');
        $banners = BannerSlider::where('user_id', auth()->user()->id)->get();
        return view('backend.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create banner');

        return view('backend.banner.create');
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
            'slider_name' => 'required',
            'image' => 'required', 'max:512'

        ]);

        $banner = new BannerSlider();
        $banner->slider_name = $request->slider_name;
        $banner->url = $request->url;
        if ($request->hasFile('image')) {
            $filename = $request->image;
            $newname = time() . '.' . $filename->extension();
            $filename->move('images', $newname);
            $banner->image = 'images/' . $newname;
        } else {
            $banner->image = asset('icon/icon.png');
        }
        $banner->user_id = auth()->user()->id;
        $banner->save();
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
        // $this->authorize('edit banner');
        $banner = BannerSlider::find($id);
        return view('backend.banner.edit', compact('banner'));
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
        $banner = BannerSlider::find($id);
        $banner->slider_name = $request->slider_name;
        $banner->url = $request->url;
        if ($request->hasFile('image')) {
            $filename = $request->image;
            $newname = time() . '.' . $filename->extension();
            $filename->move('images', $newname);
            $banner->image = 'images/' . $newname;
        } else {
            $banner->image = asset('icon/icon.png');
        }
        $banner->update();
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
        $banner = BannerSlider::find($id);
        $banner->delete();
        return redirect()->back();
    }
}
