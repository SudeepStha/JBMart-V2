<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view purchase order');
        $purchase_query = Purchase::query();
        if(!$request->user()->can('view all purchase orders')){
            $purchase_query->where('user_id', auth()->user()->id);
        }
        $purchases = $purchase_query->get();
        // $purchases=Purchase::when(!$request->user()->can('view all purchase orders'), function(Builder $query){
        //     $query->where('user_id', auth()->user()->id);
        // })->get();
   
        return view('backend.purchase.index',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $store = User::with('store')->find(Auth::id() ?? '');
        $statuses = Purchase::STATUS;
        return view('backend.purchase.create', compact('store','statuses'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //purchase 
         $purchase=new Purchase();
         $purchase->user_id=Auth::User()->id;
         $purchase->date=$request->date;
         $purchase->remarks=$request->remarks;
         $purchase->save();

         //Purchase item

         foreach ($request->items as $index => $item) {
            
             
            $purchase_item = new PurchaseItem();
            $purchase_item->name  =$item['name'];
            $purchase_item->qty = $item['qty'];
            $purchase_item->unit=$item['unit'];
            $purchase_item->purchase_id=$purchase->id;
            $purchase_item->save();
        }
        return redirect('/purchase');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchase=Purchase::find($id);
        $purchase_items=$purchase->purchase_items;
        return view('backend.purchase.show',compact('purchase_items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('set purchase order status');
        $purchase=Purchase::find($id);
        $statuses = Purchase::STATUS;
        return view('backend.purchase.edit',compact('purchase','statuses'));
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
        $this->authorize('set purchase order status');
        $purchase=Purchase::find($id);
        $purchase->status=$request->status;
        $purchase->update();
        return redirect('/purchase');
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
