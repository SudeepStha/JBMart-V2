<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
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
        $this->authorize('view product');
        $products = Product::where('store_id', User::with('store')->find(Auth::id())->store->id)->get();
        return view('backend.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $store = Store::where('user_id',Auth::id())->first();
        if($store==null){
            return redirect('/profiles/create');
        }
        $this->authorize('create product');
        $units = Unit::where('store_id', User::with('store')->find(Auth::id())->store->id)->get();
        $categories = Category::where('store_id', User::with('store')->find(Auth::id())->store->id)->get();
        return view('backend.product.create', compact('categories', 'units'));
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
            'name' => 'required',
            'price' => 'required',
            'final_price' => 'required',
            'image' => 'required', 'max:512' //Max Size 512 KB
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->unit_id = $request->unit_id;
        $product->final_price = $request->final_price;
     
        // $product->is_featured = $request->isFeatured;
        // $product->product_status = $request->status;
        $product->description = $request->description;
        if ($request->hasFile('image')) {
            $fileName = $request->image;
            $newName = time() . "." . $fileName->extension();
            $fileName->move('images', $newName);
            $product->featured_image = 'images/' . $newName;
        } else {
            $product->featured_image = asset('icon/icon.png');
        }
        $product->category_id = $request->category_id;
        $product->store_id = User::with('store')->find(Auth::id())->store->id;
        $product->save();
        $request->session()->flash('message', 'Record Saved');
        return redirect('/product');
        // User::with('category')->find(Auth::id())->category->id;
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
        $this->authorize('edit product');
        $units = Unit::where('store_id', User::with('store')->find(Auth::id())->store->id)->get();
        $categories = Category::where('store_id', User::with('store')->find(Auth::id())->store->id)->get();
        $products = Product::find($id);
        return view('backend.product.edit', compact('categories', 'products', 'units'));
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
            'image' => 'nullable', 'max:512' //Max Size 512 KB
        ]);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->unit_id = $request->unit_id;
        $product->price = $request->price;
        $product->final_price = $request->final_price;
    
        // $product->is_featured = $request->isFeatured;
        // $product->product_status = $request->status;
        $product->description = $request->description;
        if ($request->hasFile('image')) {
            $fileName = $request->image;
            $newName = time() . "." . $fileName->extension();
            $fileName->move('images', $newName);
            $product->featured_image = 'images/' . $newName;
        }
        $product->category_id = $request->category_id;
        $product->update();
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
        $product = Product::find($id);
        $product->delete();
        return redirect('/product');
    }
}
