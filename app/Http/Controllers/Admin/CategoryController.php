<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Store;
use App\Models\StoreType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Psy\Command\WhereamiCommand;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store = Store::where('user_id',Auth::id())->first();
        if($store==null){
            return redirect('/profiles/create');
        }
        $this->authorize('view category');
        $categories = Category::where('store_id', User::with('store')->find(Auth::id())->store->id)->get();
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create category');


        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return User::with('store')->find(Auth::id())->store->id;
        $date = $request->validate([
            'name' => 'required',
            'image' => 'max:512' //Max Size 512 KB
        ]);

        $category = new Category();
        $category->name = $request->name;
        if ($request->hasFile('image')) {
            $fileName = $request->image;
            $newName = time() . "." . $fileName->extension();
            $fileName->move('images', $newName);
            $category->image = 'images/' . $newName;
        } else {
            $category->image = 'icon/icon.png';
        }
        $category->store_id = User::with('store')->find(Auth::id())->store->id;
        $category->save();
        $request->session()->flash('message', 'Record Saved');
        return redirect('/category');
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
        $this->authorize('edit category');

        $category = Category::find($id);
        return view('backend.category.edit', compact('category'));
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
            'name' => 'required',
            'image' => 'required', 'max:512' //Max Size 512 KB
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        if ($request->hasFile('image')) {
            $fileName = $request->image;
            $newName = time() . "." . $fileName->extension();
            $fileName->move('images', $newName);
            $category->image = 'images/' . $newName;
        } else {
            $category->image ='icon/icon.png';
        }
        // $category->store_id = $request->store_id;
        $category->update();
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
        $category = Category::find($id);
        $category->delete();
        return  redirect()->back();
    }
}
