<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deliver;
use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->authorize('view delivery');
        $deliveries = Delivery::all();
        return view('backend.delivery.index', compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create delivery');
        return view('backend.delivery.create');
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
            'address' => 'required',
            'gender' => 'required',
            'contact' => 'required',
        ]);

        $deliveries = new Delivery();
        $deliveries->name = $request->name;
        $deliveries->address = $request->address;
        $deliveries->gender = $request->gender;
        $deliveries->contact = $request->contact;

        $deliveries->save();

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
        // $this->authorize('edit delivery');

        $delivery = Delivery::find($id);
        return view('backend.delivery.edit', compact('delivery'));
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
        $deliveries = Delivery::find($id);
        $deliveries->name = $request->name;
        $deliveries->address = $request->address;
        $deliveries->gender = $request->gender;
        $deliveries->contact = $request->contact;

        $deliveries->update();

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
        $deliveries =  Delivery::find($id);
        $deliveries->delete();
        return redirect()->back();
    }
}
