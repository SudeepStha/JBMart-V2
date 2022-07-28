<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $this->authorize('view order');
        // $address = Address::all();
        $orders = Order::with('address')->orderBy('created_at','DESC')->get();
        return view('backend.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $this->authorize('create order');
        // $cart =  Cart::all();
        // $order = new Ord
        // return view('backend.order.edit');
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

        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->store_id = Store::where('store_id', User::with('store')->find(Auth::id())->store->id)->get();
        $order->shipping_date = $request->shipping_date;
        $order->shipping_time  = $request->shipping_time;
        $order->total  = $request->total;
        $order->delivery_charge  = $request->delivery_charge;
        $order->grand_total = $request->grand_total;
        $order->order_status = $request->order_status;
        $order->delivery_status = $request->delivery_status;
        $order->save();
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
        //
        // $this->authorize('edit order');
        $order = Order::find($id);
        $orders=Order::all();
        $order_detail=OrderDetails::all();
        return view('backend.order.edit', compact('order','orders','order_detail'));
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
