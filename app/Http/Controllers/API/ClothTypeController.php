<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\cloth_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClothTypeController extends Controller
{

    public function index()
    {
        $cloth_types = DB::table('cloth_types AS c')
        ->get([
            'c.*',
        ]);

        return response()->json([
            'status' => 200,
            'cloth_types' => $cloth_types
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $cloth_type = new cloth_type();
        $cloth_type->name = $request->input('name');
        $data = $cloth_type->save();
        
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

        $cloth_type = cloth_type::find($id);
        $cloth_type->name = $request->input('name');
        $data = $cloth_type->update();

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