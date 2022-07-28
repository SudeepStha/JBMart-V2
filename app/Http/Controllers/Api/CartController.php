<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartCollection;
use App\Http\Resources\CartResource;
use App\Http\Resources\StoreCartResource;
use App\Http\Resources\StoreResoure;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::whereHas('carts', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })
            ->with(['carts' => function ($query) {
                $query->where('user_id', Auth::user()->id);
                $query->with(['product']);
            }])
            ->get();

        return StoreCartResource::collection($stores);

        // $cart =
        //     array_values(Cart::where('user_id', Auth::user()->id)
        //         ->with(['store', 'product'])->get()
        //         ->groupBy('store.id')
        //         ->map(function ($item, $key) {
        //             return [
        //                 'store_id' => $key, 'store_name' => $item->first()->store->store_name,
        //                 'total' => $item->sum(function ($cart_item) {
        //                     return $cart_item->product->final_price * $cart_item->qty;
        //                 }),
        //                 'featured_image' => asset($item->first()->store->featured_image),
        //                 'total_quantity' =>  $item->sum('qty'),
        //                 'total_items' => $item->count(),
        //                 'cart' => CartResource::collection($item)
        //             ];
        //         })->toArray());
        // return $cart;



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $cart = new Cart();
        $cart->user_id = auth()->user()->id;
        $cart->store_id = $product->store_id;
        $cart->product_id = $request->product_id;
        $cart->qty = $request->qty;
        $cart->amount = $product->final_price;
        $cart->save();
        return response()->json(['message' => 'success']);
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
        // $store = Store::where('store_id', $id)->get();
        // $cart = DB::table('carts')->select('user_id', 'store_id')->distinct()->get();
        // return CartResource::collection($cart, $store);

        $store = Store::where('id', $id)
            ->with(['carts' => function ($query) {
                $query->where('user_id', Auth::user()->id);
                $query->with(['product']);
            }])
            ->firstOrFail();

        return new StoreCartResource($store);

        // $carts = Cart::where('store_id', $id)->with(['product', 'store'])->get();
        // return new CartCollection($carts);
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
        $cart = Cart::find($id);
        $cart->user_id = auth()->user()->id;
        $cart->store_id = $request->store_id;
        $cart->product_id = $request->product_id;
        $cart->qty = $request->qty;
        $cart->amount = $request->amount;
        $cart->update();
        return response()->json(['message' => 'success']);
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
        $cart = Cart::find($id);
        $cart->delete();
        return response()->json(['message' => 'success']);
    }
}
