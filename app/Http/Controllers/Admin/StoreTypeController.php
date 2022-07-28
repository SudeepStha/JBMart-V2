<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StoreType;
use Illuminate\Http\Request;

class StoreTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view store-type');

        $storetypes = StoreType::all();
        return view('backend.storetype.index', compact('storetypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create store-type');

        return view('backend.storetype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'max:512' //Max Size 512 KB
        ]);

        $storeType = new StoreType();
        $storeType->name = $request->name;
        if ($request->hasFile('image')) {
            $fileName = $request->image;
            $newName = time() . "." . $fileName->extension();
            $fileName->move('images', $newName);
            $storeType->image = 'images/' . $newName;
        } else {
            $storeType->image = asset('icon/icon.png');
        }
        $storeType->user_id = auth()->user()->id;
        $storeType->save();
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
        $this->authorize('edit store-type');

        $storeType = StoreType::find($id);
        return view('backend.storetype.edit', compact('storeType'));
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
        $request->validate([
            'name' => 'required',
        ]);

        $storeType = StoreType::find($id);
        $storeType->name = $request->name;
        if ($request->hasFile('image')) {
            $fileName = $request->image;
            $newName = time() . "." . $fileName->extension();
            $fileName->move('images', $newName);
            $storeType->image = 'images/' . $newName;
        }
        $storeType->user_id = auth()->user()->id;
        $storeType->update();
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
        $storetype=StoreType::find($id);
        $storetype->delete();
        return redirect('/stores');
    }
}
