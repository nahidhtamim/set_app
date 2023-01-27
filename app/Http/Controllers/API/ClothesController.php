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
        return Cloth::all();
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
            'size' => 'required',
            'color' => 'required',
            'fabric' => 'required',
            'weight' => 'required',
            'brand' => 'required',
            'wash_program_number' => 'required',
            'dryer_program_number' => 'required',
        ]);

        return Cloth::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($hexa)
    {
        $cloth = Cloth::where('hexa_code', $hexa)->first();
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
        return $cloth;
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
        return $cloth;
    }

     /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($hexa)
    {
        return Cloth::where('hexa_code', 'like', '%'.$hexa.'%')->get();
    }
}
