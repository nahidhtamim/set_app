<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\sportswear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SportsWearController extends Controller
{
    public function index()
    {
        $sportswears = DB::table('sportswears AS sw')
        ->get([
            'sw.*',
        ]);

        return response()->json([
            'status' => 200,
            'sportswears' => $sportswears
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $sportswear = new sportswear();
        $sportswear->name = $request->input('name');
        $data = $sportswear->save();
        
        if(!$data){
            return response()->json([
                'status' => 400,
                'error' => 'Something Went Wrong'
            ], 400);
        }else{
            return response()->json([
                'status' => 200,
                'success' => 'Data Stored Successfully'
            ], 200);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $sportswear = sportswear::find($id);
        $sportswear->name = $request->input('name');
        $data = $sportswear->update();

        if(!$data){
            return response()->json([
                'status' => 400,
                'error' => 'Please check the inputs'
            ], 400);
        }else{
            return response()->json([
                'status' => 200,
                'success' => 'Data Updated Successfully'
            ], 200);
        }
    }
}
