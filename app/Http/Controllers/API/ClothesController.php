<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cloth;
use Illuminate\Http\Request;

class ClothesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cloth = Cloth::all();

        return response()->json([
            'cloth' => $cloth
        ], 200);
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
            'customer_id' => 'required',
            'order_id' => 'required',
            'hexa_code' => 'required',
            'size' => 'required',
            'color' => 'required',
            'fabric' => 'required',
            'weight' => 'required',
            'brand' => 'required',
            'wash_program_number' => 'required',
            'dryer_program_number' => 'required',
        ]);

        $data = Cloth::create($request->all());
        
        if(!$data){
            return response()->json([
                'status' => 400,
                'error' => 'Something Went Wrong'
            ], 400);
        }else{
            return response()->json([
                'status' => 200,
                'message' => 'Data Stored Successfully'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($hexa)
    {
        //$cloth = Cloth::where('hexa_code', $hexa)->first();

        $cloth = Cloth::all();

        if(isset($cloth)){
            return response()->json([
                'cloth' => $cloth
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'error' => 'Data Not Found'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $hexa)
    {
        $cloth = Cloth::where('hexa_code', $hexa)->first();

        $cloth->update($request->all());

        if(!$cloth){
            return response()->json([
                'status' => 400,
                'error' => 'Something Went Wrong'
            ], 400);
        }else{
            return response()->json([
                'status' => 200,
                'error' => 'Data Updated Successfully'
            ], 200);
        }
        // return $cloth;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($hexa)
    {
        $cloth = Cloth::where('hexa_code', $hexa)->first();
        $cloth->delete();
        
        if(!$cloth){
            return response()->json([
                'status' => 400,
                'error' => 'Something Went Wrong'
            ], 400);
        }else{
            return response()->json([
                'status' => 200,
                'error' => 'Data Deleted Successfully'
            ], 200);
        }

        // return $cloth;
    }

     /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($hexa)
    {
        $cloth = Cloth::where('hexa_code', 'like', '%'.$hexa.'%')->first();
        
        if(isset($cloth)){
            return response()->json([
                'cloth' => $cloth
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'error' => 'Data Not Found'
            ], 404);
        }
    }
}
