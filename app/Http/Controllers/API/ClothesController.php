<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cloth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClothesController extends Controller
{

    public function index()
    {
        $clothes = DB::table('cloths AS c')
        ->leftJoin('users as u', function($join)
        {
            $join->on('c.customer_id', '=', 'u.id');
        })
        ->leftJoin('orders as o', function($join)
        {
            $join->on('c.order_id', '=', 'o.id');
        })
        ->leftJoin('sports as sp', function($join)
        {
            $join->on('o.sport_id', '=', 'sp.id');
        })
        ->leftJoin('places as p', function($join)
        {
            $join->on('o.place_id', '=', 'p.id');
        })
        ->leftJoin('place_lockers as lock', function($join)
        {
            $join->on('o.locker_id', '=', 'lock.id');
        })
        ->leftJoin('services as s', function($join)
        {
            $join->on('c.service_id', '=', 's.id');
        })
        ->leftJoin('service_cycle_locations as scl', function($join)
        {
            $join->on('c.wash_program_number', '=', 'scl.id');
        })
        ->get([
            'c.id as id',
            'c.hexa_code as code', 
            'c.set_id as set_id',
            'u.name as username',
            'u.email as email',
            'u.name as username',
            'u.name as username',
            'sp.sport_name as sport',
            'p.place_name as place',
            'lock.code as locker_code',
            'lock.name as locker',
            'lock.storage_name as storage',
            'o.dob as dob',
            'o.gender as gender',
            'o.shipping_name as shipping_name',
            'o.shipping_address as shipping_address',
            'o.shipping_phone as shipping_phone',
            'o.shipping_email as shipping_email',
            'o.billing_name as billing_name',
            'o.billing_address as billing_address',
            'o.billing_email as billing_email',
            'o.message as message',
            's.service_name as service_name',
            's.service_name_ger as service_name_ger',
            's.service_price as service_price',
            's.service_image as service_image',
            's.short_desc as short_desc',
            's.short_desc_ger as short_desc_ger',
            's.long_desc as long_desc',
            's.long_desc_ger as long_desc_ger',
            'scl.location as status',
            
        ]);

        return response()->json([
            'status' => 200,
            'cloth' => $clothes
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'order_id' => 'required',
            'hexa_code' => 'required',
            'service_id' => 'required',
            'set_id' => 'required',
        ]);

        $cloth = new cloth();
        $cloth->hexa_code = $request->input('hexa_code');
        $cloth->customer_id = $request->input('customer_id');
        $cloth->order_id = $request->input('order_id');
        $cloth->service_id = $request->input('service_id');
        $cloth->set_id = $request->input('set_id');
        $data = $cloth->save();
        
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
            'customer_id' => 'required',
            'order_id' => 'required',
            'hexa_code' => 'required',
            'service_id' => 'required',
            'set_id' => 'required',
        ]);

        $cloth = cloth::find($id);
        $cloth->hexa_code = $request->input('hexa_code');
        $cloth->customer_id = $request->input('customer_id');
        $cloth->order_id = $request->input('order_id');
        $cloth->service_id = $request->input('service_id');
        $cloth->set_id = $request->input('set_id');
        $data = $cloth->update();

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

    public function updateServiceCycleStatus(Request $request, $id)
    {
        $request->validate([
            'wash_program_number' => 'required',
        ]);

        $cloth = cloth::find($id);
        $cloth->wash_program_number = $request->input('wash_program_number');
        $data = $cloth->update();

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

    public function delete($id)
    {
        $cloth = cloth::find($id);
        $data = $cloth->delete();
        
        if(!$data){
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

    }

    public function search($id)
    {

        $cloth = DB::table('cloths AS c')
        ->leftJoin('users as u', function($join)
        {
            $join->on('c.customer_id', '=', 'u.id');
        })
        ->leftJoin('orders as o', function($join)
        {
            $join->on('c.order_id', '=', 'o.id');
        })
        ->leftJoin('sports as sp', function($join)
        {
            $join->on('o.sport_id', '=', 'sp.id');
        })
        ->leftJoin('places as p', function($join)
        {
            $join->on('o.place_id', '=', 'p.id');
        })
        ->leftJoin('place_lockers as lock', function($join)
        {
            $join->on('o.locker_id', '=', 'lock.id');
        })
        ->leftJoin('services as s', function($join)
        {
            $join->on('c.service_id', '=', 's.id');
        })
        ->leftJoin('service_cycle_locations as scl', function($join)
        {
            $join->on('c.wash_program_number', '=', 'scl.id');
        })
        ->where('c.id', '=', $id)
        ->get([
            'c.id as id',
            'c.hexa_code as code', 
            'c.set_id as set_id',
            'u.name as username',
            'u.email as email',
            'u.name as username',
            'u.name as username',
            'sp.sport_name as sport',
            'p.place_name as place',
            'lock.code as locker_code',
            'lock.name as locker',
            'lock.storage_name as storage',
            'o.dob as dob',
            'o.gender as gender',
            'o.shipping_name as shipping_name',
            'o.shipping_address as shipping_address',
            'o.shipping_phone as shipping_phone',
            'o.shipping_email as shipping_email',
            'o.billing_name as billing_name',
            'o.billing_address as billing_address',
            'o.billing_email as billing_email',
            'o.message as message',
            's.service_name as service_name',
            's.service_name_ger as service_name_ger',
            's.service_price as service_price',
            's.service_image as service_image',
            's.short_desc as short_desc',
            's.short_desc_ger as short_desc_ger',
            's.long_desc as long_desc',
            's.long_desc_ger as long_desc_ger',
            'scl.location as status',
        ]);
        if(count($cloth) > 0){
            return response()->json([
                'status' => 200,
                'cloth' => $cloth
            ], 200);
        }else{
            return response()->json([
                'status' => 400,
                'error' => 'Data Not Found'
            ], 400);
        }
    }
}
