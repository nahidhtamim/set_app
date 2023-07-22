<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\fabric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FabricController extends Controller
{
    public function index()
    {
        $fabrics = DB::table('fabrics AS f')
        ->get([
            'f.*',
        ]);

        return response()->json([
            'status' => 200,
            'fabrics' => $fabrics
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $fabric = new fabric();
        $fabric->name = $request->input('name');
        $data = $fabric->save();
        
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

        $fabric = fabric::find($id);
        $fabric->name = $request->input('name');
        $data = $fabric->update();

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
