<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'address' => 'required|string|max:191',
            'phone' => 'required|string|max:191',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'address' => $data['address'],
            'phone' => $data['phone'],
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
            'status' => 200,
        ];

        //return response($response, 201);
        return response()->json($response, 200);
    }

    public function login(Request $request) {
        $data = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $data['email'])->first();

        // Check password
        if(!$user || !Hash::check($data['password'], $user->password)) {
            return response([
                'message' => 'Wrong Credentials'
            ], 401);
        }
        elseif($user->role_as != '1') {
            return response([
                'message' => 'You are not an admin'
            ], 401);
        }
        elseif($user->email_verified_at == null) {
            return response([
                'message' => 'You are not verified'
            ], 401);
        }
        $token = $user->createToken('app_token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
            'status' => 200,
        ];

        return response()->json($response, 200);
        //return response($response, 201);
    }

    public function logout(Request $request) {
        // auth()->user()->tokens()->delete();
        //Auth::user()->tokens()->delete();
        $request->user()->currentAccessToken()->delete();
        //$user->tokens()->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Logged out'
        ], 200);
    }
}
