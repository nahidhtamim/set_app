<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\laundry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaundryController extends Controller
{
    public function index()
    {
        $laundries = DB::table('laundries AS l')
        ->leftJoin('users as u', function($join)
        {
            $join->on('l.customer_id', '=', 'u.id');
        })
        ->leftJoin('orders as o', function($join)
        {
            $join->on('l.order_id', '=', 'o.id');
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
        ->leftJoin('washing_programs as wu', function($join)
        {
            $join->on('l.washing_program', '=', 'wu.id');
        })
        ->leftJoin('cloth_groups as cg', function($join)
        {
            $join->on('l.cloth_group', '=', 'cg.id');
        })
        ->leftJoin('cloth_types as ct', function($join)
        {
            $join->on('l.cloth_type', '=', 'ct.id');
        })
        ->leftJoin('fabrics as f', function($join)
        {
            $join->on('l.fabric', '=', 'f.id');
        })
        ->leftJoin('sportswears as sw', function($join)
        {
            $join->on('l.sportswear_type', '=', 'sw.id');
        })
        ->leftJoin('service_cycle_locations as scl', function($join)
        {
            $join->on('l.status', '=', 'scl.id');
        })

        ->get([
            'l.id as id',
            'l.laundry_description as laundry_description', 
            'l.set_id as set_id',
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
            'cg.name as cloth_group',
            'ct.name as cloth_type',
            'f.name as fabric',
            'sw.name as sportswear_type',
            'scl.location as status',
        ]);
        return response()->json([
            'status' => 200,
            'laundries' => $laundries
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'order_id' => 'required',
            'set_id' => 'required',
            'washing_program' => 'required',
            'cloth_group' => 'required',
            'cloth_type' => 'required',
            'fabric' => 'required',
            'sportswear_type' => 'required',
        ]);

        $laundry = new laundry();
        $laundry->customer_id = $request->input('customer_id');
        $laundry->order_id = $request->input('order_id');
        $laundry->set_id = $request->input('set_id');
        $laundry->washing_program = $request->input('washing_program');
        $laundry->cloth_group = $request->input('cloth_group');
        $laundry->cloth_type = $request->input('cloth_type');
        $laundry->fabric = $request->input('fabric');
        $laundry->sportswear_type = $request->input('sportswear_type');
        $laundry->laundry_description = $request->input('laundry_description');
        $data = $laundry->save();
        
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required',
            'order_id' => 'required',
            'set_id' => 'required',
            'washing_program' => 'required',
            'cloth_group' => 'required',
            'cloth_type' => 'required',
            'fabric' => 'required',
            'sportswear_type' => 'required',
        ]);

        $laundry = laundry::find($id);
        $laundry->customer_id = $request->input('customer_id');
        $laundry->order_id = $request->input('order_id');
        $laundry->set_id = $request->input('set_id');
        $laundry->washing_program = $request->input('washing_program');
        $laundry->cloth_group = $request->input('cloth_group');
        $laundry->cloth_type = $request->input('cloth_type');
        $laundry->fabric = $request->input('fabric');
        $laundry->sportswear_type = $request->input('sportswear_type');
        $laundry->laundry_description = $request->input('laundry_description');
        $data = $laundry->update();

        if(!$data){
            return response()->json([
                'status' => 400,
                'error' => 'Please check the inputs'
            ], 400);
        }else{
            return response()->json([
                'status' => 200,
                'error' => 'Data Updated Successfully'
            ], 200);
        }
    }

    public function updateLaundryServiceCycleStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $laundry = laundry::find($id);
        $laundry->status = $request->input('status');
        $data = $laundry->update();

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
        $laundry = laundry::find($id);
        $data = $laundry->delete();
        
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
        $laundry = DB::table('laundries AS l')
        ->leftJoin('users as u', function($join)
        {
            $join->on('l.customer_id', '=', 'u.id');
        })
        ->leftJoin('orders as o', function($join)
        {
            $join->on('l.order_id', '=', 'o.id');
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
        ->leftJoin('washing_programs as wu', function($join)
        {
            $join->on('l.washing_program', '=', 'wu.id');
        })
        ->leftJoin('cloth_groups as cg', function($join)
        {
            $join->on('l.cloth_group', '=', 'cg.id');
        })
        ->leftJoin('cloth_types as ct', function($join)
        {
            $join->on('l.cloth_type', '=', 'ct.id');
        })
        ->leftJoin('fabrics as f', function($join)
        {
            $join->on('l.fabric', '=', 'f.id');
        })
        ->leftJoin('sportswears as sw', function($join)
        {
            $join->on('l.sportswear_type', '=', 'sw.id');
        })
        ->leftJoin('service_cycle_locations as scl', function($join)
        {
            $join->on('l.status', '=', 'scl.id');
        })

        ->where('l.id', '=', $id)
        ->get([
            'l.id as id',
            'l.laundry_description as laundry_description', 
            'l.set_id as set_id',
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
            'cg.name as cloth_group',
            'ct.name as cloth_type',
            'f.name as fabric',
            'sw.name as sportswear_type',
            'scl.location as status',
        ]);

        if(count($laundry) > 0){
            return response()->json([
                'status' => 200,
                'laundry' => $laundry
            ], 200);
        }else{
            return response()->json([
                'status' => 400,
                'error' => 'Data Not Found'
            ], 400);
        }
    }
}
