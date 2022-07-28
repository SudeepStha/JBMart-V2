<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeaturedProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('view featured-product');
        // $units = Unit::all();
        $featured_products = Product::all();
        return view('backend.featured_product.index', compact('featured_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('view featured-product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
        $this->authorize('view featured-product');
        $units = Unit::where('store_id', User::with('store')->find(Auth::id())->store->id);
        $categories = Category::all();
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
        //
        $product = Product::find($id);
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->unit_id = $request->unit_id;
        $product->final_price = $request->final_price;
        $product->is_discount = $request->isDiscount;
        $product->special_price = $request->special_price;
        $product->is_featured = $request->isFeatured;
        $product->product_status = $request->status;
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
        //
    }
}
