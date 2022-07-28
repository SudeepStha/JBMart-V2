<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Register

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'mobile' => 'required',
            'city' => 'required',
            'street' => 'required',
            'near_by' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Bad Request'
            ], 500);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->password = Hash::make($request->password);
        $user->save();

        $address = new Address();
        $address->city =  $request->city;
        $address->street = $request->street;
        $address->near_by = $request->near_by;
        $address->user_id = $user->id;
        $address->is_default = TRUE;
        $address->save();

        return response()->json([
            'message' => 'User Created'
        ], 201);
    }

    // Login

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Bad Request'
            ], 500);
        }

        $credintials = request(['email', 'password']);

        if (!Auth::attempt($credintials)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = User::where('email', $request->email)->first();

        $tokenResult = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'token' => $tokenResult
        ], 200);
    }

    // Logout

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Token Deleted'
        ]);
    }
}
