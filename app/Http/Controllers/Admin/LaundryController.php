<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cloth;
use App\Models\cloth_group;
use App\Models\cloth_type;
use App\Models\fabric;
use App\Models\laundry;
use App\Models\service_cycle_location;
use App\Models\Sport;
use App\Models\sportswear;
use App\Models\User;
use App\Models\washing_program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaundryController extends Controller
{
    public function index(){
        $laundries = laundry::all();
        $cloth_groups = cloth_group::all();
        $cloth_types = cloth_type::all();
        $fabrics = fabric::all();
        $sportswears = sportswear::all();
        $washing_programs = washing_program::all();
        $locations = service_cycle_location::all();
        return view('admin.laundry.index', compact('laundries', 'cloth_groups', 'cloth_types', 'fabrics', 'sportswears', 'washing_programs', 'locations'));
    }

    public function addLaundry(){
        $users = User::all();
        $cloth_groups = cloth_group::all();
        $cloth_types = cloth_type::all();
        $fabrics = fabric::all();
        $sportswears = sportswear::all();
        $washing_programs = washing_program::all();
        $locations = service_cycle_location::all();
        return view('admin.laundry.add-laundry', compact('cloth_groups', 'cloth_types', 'fabrics', 'sportswears', 'washing_programs', 'users', 'locations'));
    }

    public function saveLaundry(Request $request){
        $customer_id = $request->customer_id;
        $order_id = $request->order_id;
        $set_id = $request->set_id;
        $washing_program = $request->washing_program;
        $cloth_group = $request->cloth_group;
        $cloth_type = $request->cloth_type;
        $fabric = $request->fabric;
        $sportswear_type = $request->sportswear_type;
        $laundry_description = $request->laundry_description;
        for($i = 0; $i < count($fabric); $i++){
            $datasave = [
                'customer_id' => $customer_id[$i],
                'order_id' => $order_id[$i],
                'set_id' => $set_id[$i],
                'washing_program' => $washing_program[$i],
                'cloth_group' => $cloth_group[$i],
                'cloth_type' => $cloth_type[$i],
                'fabric' => $fabric[$i],
                'sportswear_type' => $sportswear_type[$i],
                'laundry_description' => $laundry_description[$i]
            ];
            DB::table('laundries')->insert($datasave);
        }

        return redirect('/laundries')->with('status', 'Laundry Added Successfully');
    }

    public function editLaundry($id){
        $laundry = laundry::find($id);
        $cloth_groups = cloth_group::all();
        $cloth_types = cloth_type::all();
        $fabrics = fabric::all();
        $sportswears = sportswear::all();
        $washing_programs = washing_program::all();
        $locations = service_cycle_location::all();
        return view('admin.laundry.edit-laundry', compact('laundry', 'cloth_groups', 'cloth_types', 'fabrics', 'sportswears', 'washing_programs', 'locations'));
    }

    public function updateLaundry($id, Request $request){
        $laundry = laundry::find($id);
        $laundry->washing_program = $request->input('washing_program');
        $laundry->cloth_group = $request->input('cloth_group');
        $laundry->cloth_type = $request->input('cloth_type');
        $laundry->fabric = $request->input('fabric');
        $laundry->sportswear_type = $request->input('sportswear_type');
        $laundry->laundry_description = $request->input('laundry_description');
        $laundry->update();
        return redirect('/laundries')->with('status', 'Laundry Updated Successfully');
    }

    public function deleteLaundry($id){
        $laundry = laundry::find($id);
        $laundry->delete();
        return redirect('/laundries')->with('warning', 'Laundry Deleted Successfully');
    }

    public function updateSetLaundryLocationStatus($id, Request $request)
    {
        $laundry = laundry::find($id);
        $laundry->status = $request->input('status');
        $laundry->update();
        return redirect()->back()->with('status', 'Service Location Status Updated');
    }

}
