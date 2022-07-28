<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $order = Order::where('user_id', $request->user()->id)->with(['order_details', 'order_details.product'])->orderBy('created_at', 'desc')->get();
        // return $order;
        return OrderResource::collection($order);
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
            'store_id' => 'required|exists:stores,id',
            'shipping_date' => 'required|date',
            'shipping_time' => 'nullable|date_format:H:i',
            'address_id' => 'required|exists:addresses,id'
        ]);
        $carts = Cart::where('user_id', Auth::user()->id)->where('store_id', $request->store_id);
        
        if($carts->count()==0){
            return response()->json(["message"=>"Cart From this store is empty"],400);
        }

        DB::transaction(function () use ($request, $carts) {
            $order = new Order();
            $order->shipping_date =  $request->shipping_date;
            $order->shipping_time =  $request->shipping_time;
            $order->user_id = Auth::user()->id;
            $order->store_id = $request->store_id;
            $order->address_id = $request->address_id;
            // $order->shipping_time = $request->shipping_time; 
            $order->delivery_charge  = 50;
            $order->grand_total = 0;
            // $order->address = Address::where('address_id', User::with('address')->find(Auth::id())->address->id)->get();
            $order->order_status = Order::ORDER_PENDING;
            $order->delivery_status = Order::DELEVERY_PENDING;
            $order->total = 0;

            $order->save();
            $carts->each(function ($cart, $key) use ($order) {
                $item = new OrderDetails();
                $item->order_id = $order->id;
                $item->product_id = $cart->product_id;
                $item->qty = $cart->qty;
                $item->rate = $cart->product->final_price;
                $item->amount = $cart->qty * $cart->product->final_price;
                $item->save();
                $cart->delete();
            });
            $order->grand_total = $order->order_details->sum('amount');
            $order->update();
        });
        return response()->json([
            'message' => 'Record Saved'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $order = Order::where('user_id', $request->user()->id)->where('id', $id)->with(['order_details', 'order_details.product'])->firstOrFail();
        // return $order;
        return new OrderResource($order);
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
