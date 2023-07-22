<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\cloth_group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClothGroupController extends Controller
{
    public function index()
    {
        $cloth_groups = DB::table('cloth_groups AS c')
        ->get([
            'c.*',
        ]);

        return response()->json([
            'status' => 200,
            'cloth_groups' => $cloth_groups
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $cloth_group = new cloth_group();
        $cloth_group->name = $request->input('name');
        $cloth_group->description = $request->input('description');
        $data = $cloth_group->save();
        
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

        $cloth_group = cloth_group::find($id);
        $cloth_group->name = $request->input('name');
        $cloth_group->description = $request->input('description');
        $data = $cloth_group->update();

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
