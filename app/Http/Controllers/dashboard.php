<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboard extends Controller
{
    //
    public function dashboard()
    {
        $users = User::with('store')->find(Auth::id())->store->id;
        return view('backend.app', compact('users'));
    }
}
