<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $users = user::where('role_as', '!=', '1')->get();

        return response()->json([
            'users' => $users
        ], 200);
    }

    public function customerSearch($id)
    {
        $user = User::where('id', $id)->first();
        
        if(isset($user)){
            return response()->json([
                'user' => $user
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'error' => 'Data Not Found'
            ], 404);
        }
    }
}
