<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\StoreType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view store');

        $store = User::with('store')->find(Auth::id() ?? '');
        // return $store;
        return view('backend.store.index', compact('store'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create store');

        $storetypes = StoreType::all();
        return view('backend.store.create', compact('storetypes'));
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
                'storeName' => 'required',
                'store_type_id' => 'required',
                'address' => 'required',
                'minimum_order' => 'required',
                'logo' => 'required | max:512',
                'featured_image' => 'required|image',
                'sunday' => 'required', 
                'monday' => 'required', 
                'tuesday' => 'required', 
                'wednesday' => 'required', 
                'thursday' => 'required', 
                'friday' => 'required', 
                'saturday' => 'required', 
            ]);

        // return "Sajal";
        // return $request->storeName;

        if (Auth::check() && Auth::user()->store) {
            return redirect()->back();
        }

        $store = new Store();
        $store->store_name = $request->storeName;
        $store->store_type_id = $request->store_type_id;
        $store->address = $request->address;
        $store->minimum_order = $request->minimum_order;
        $store->contact = $request->contact;
        $store->website = $request->website;
        $store->store_description = $request->store_description;


        if ($request->hasFile('logo')) {
            $fileName = $request->logo;
            $newName = time() . $fileName->getClientOriginalName();
            $fileName->move('images', $newName);
            $store->logo = 'images/' . $newName;
        }

        if ($request->hasFile('featured_image')) {
            $fileName = $request->featured_image;
            $newName = time()  . $fileName->getClientOriginalName();
            $fileName->move('images', $newName);
            $store->featured_image = 'images/' . $newName;
        }

        $store->sunday = $request->sunday;
        $store->monday = $request->monday;
        $store->tuesday = $request->tuesday;
        $store->wednesday = $request->wednesday;
        $store->thursday = $request->thursday;
        $store->friday = $request->friday;
        $store->saturday = $request->saturday;

        $store->user_id = auth()->user()->id;
        // $store->visibility = $request->visibility;

        $store->save();
        $request->session()->flash('message', 'Record Saved');
        return redirect('/profiles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('edit store');

        $store = Store::find($id);
        if (auth()->user()->id != $store->user_id) {
            return redirect()->back();
        }
        $storetypes = StoreType::all();
        return view('backend.store.edit', compact('store', 'storetypes'));
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
        //    $data = $request->validate([
        //     'storeName' => 'required',
        //     'store_type' => 'required',
        //     'address' => 'required',
        //     'minimum_order' => 'required',
        //     'sunday' => 'requred', 
        //     'monday' => 'requred', 
        //     'tuesday' => 'requred', 
        //     'wednesday' => 'requred', 
        //     'thursday' => 'requred', 
        //     'friday' => 'requred', 
        //     'saturday' => 'requred', 
        //    ]);
        // return "Sajal";


        $store = Store::find($id);
        if (auth()->user()->id != $store->user_id) {
            return redirect()->back();
        }
        $store->store_name = $request->storeName;
        $store->store_type_id = $request->store_type_id;
        $store->address = $request->address;
        $store->minimum_order = $request->minimum_order;
        $store->store_description = $request->store_description;
        $store->contact = $request->contact;
        $store->website = $request->website;

        if ($request->hasFile('logo')) {
            $fileName = $request->logo;
            $newName = time() . $fileName->getClientOriginalName();
            $fileName->move('images', $newName);
            $store->logo = 'images/' . $newName;
        }

        if ($request->hasFile('featured_image')) {
            $fileName = $request->featured_image;
            $newName = time() . $fileName->getClientOriginalName();
            $fileName->move('images', $newName);
            $store->featured_image = 'images/' . $newName;
        }

        $store->sunday = $request->sunday;
        $store->monday = $request->monday;
        $store->tuesday = $request->tuesday;
        $store->wednesday = $request->wednesday;
        $store->thursday = $request->thursday;
        $store->friday = $request->friday;
        $store->saturday = $request->saturday;


        $store->update();
        $request->session()->flash('message', 'Record Updated');
        return redirect('/profiles');
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
