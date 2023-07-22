<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\washing_program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WashingProgramController extends Controller
{
    public function index()
    {
        $washing_programs = DB::table('washing_programs AS wp')
        ->get([
            'wp.*',
        ]);

        return response()->json([
            'status' => 200,
            'washing_programs' => $washing_programs
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'symbol' => 'required',
        ]);

        $washing_program = new washing_program();
        $washing_program->name = $request->input('name');
        $washing_program->description = $request->input('description');
        $washing_program->symbol = $request->input('symbol');
        $data = $washing_program->save();
        
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
            'description' => 'required',
            'symbol' => 'required',
        ]);

        $washing_program = washing_program::find($id);
        $washing_program->name = $request->input('name');
        $washing_program->description = $request->input('description');
        $washing_program->symbol = $request->input('symbol');
        $data = $washing_program->update();

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
