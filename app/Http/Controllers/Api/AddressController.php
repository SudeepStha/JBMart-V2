<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $address = Address::where('user_id', Auth::user()->id)->get();
        // $address = Address::all();
        return AddressResource::collection($address);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

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
        $address = new Address();
        $address->city = $request->city;
        $address->street = $request->street;
        $address->near_by = $request->near_by;
        $address->user_id = Auth::user()->id;

        if (Address::where('user_id', Auth::user()->id)->count() == 0) {
            $address->is_default = TRUE;
        }
        $address->save();
        return response()->json(['message' => 'Mission Success']);
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
        $address = Address::find($id);
        $address->delete();
        return response()->json(['message' => 'Record Delete']);
    }

    public function setDefault($id)
    {
        // $default_address = Address::where('user_id', Auth::user()->id)
        //     ->where('id', $id)
        //     ->where('is_default', TRUE)
        //     ->first();
        // if ($default_address) {
        //     $default_address->is_default = FALSE;
        //     $default_address->update();
        // }

        $address = Address::where('user_id', Auth::user()->id)->where('id', $id)->firstOrFail();
        $address->is_default = TRUE;
        $address->update();
        $remaining_address = Address::where('user_id', Auth::user()->id)->where('id', '!=', $id)->get();
        $remaining_address->each(function ($addr) {
            $addr->is_default = FALSE;
            $addr->update();
        });

        return response()->json(['message' => 'Address Was Set To Default']);
    }
}
