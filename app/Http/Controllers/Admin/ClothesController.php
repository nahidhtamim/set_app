<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cloth;
use App\Models\cloth_group;
use App\Models\cloth_type;
use App\Models\fabric;
use App\Models\laundry;
use App\Models\Locker;
use App\Models\Order;
use App\Models\Place;
use App\Models\PlaceLocker;
use App\Models\service_cycle_location;
use App\Models\sportswear;
use App\Models\User;
use App\Models\washing_program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ClothesController extends Controller
{
    public function index(){
        $clothes = Cloth::all();
        $locations = service_cycle_location::all();
        $lockers = PlaceLocker::all();
        $places = Place::all();
        $laundries = laundry::all();
        $cloth_groups = cloth_group::all();
        $cloth_types = cloth_type::all();
        $fabrics = fabric::all();
        $sportswears = sportswear::all();
        $washing_programs = washing_program::all();
        return view('admin.clothes.index', compact('clothes', 'locations', 'lockers', 'places', 'laundries', 'cloth_groups', 'cloth_types', 'fabrics', 'sportswears', 'washing_programs'));
    }

    public function getLaundryItems($set_id, $order_id, $customer_id)
    {
        $locations = service_cycle_location::all();
        $laundries = laundry::where('set_id', $set_id)->where('order_id', $order_id)->where('customer_id', $customer_id)->get(); 
        return view('admin.clothes.laundryItems', compact('laundries', 'locations'));
    }


    public function addCloth(){
        $users = User::where('role_as', '0')->get();
        return view('admin.clothes.add-cloth', compact('users'));
    }

    public function saveCloth(Request $request){
        $cloth = new cloth();
        $cloth->hexa_code = $request->input('hexa_code');
        $cloth->customer_id = $request->input('customer_id');
        $cloth->order_id = $request->input('order_id');
        $cloth->service_id = $request->input('service_id');
        $cloth->set_id = $request->input('set_id');
        // $cloth->cloth_type = $request->input('cloth_type');
        // $cloth->size = $request->input('size');
        // $cloth->color = $request->input('color');
        // $cloth->fabric = $request->input('fabric');
        // $cloth->weight = $request->input('weight');
        // $cloth->brand = $request->input('brand');
        // $cloth->cloth_status = '1';
        // if($request->hasFile('image')){
        //     $image = $request->file('image');
        //     $fileName = time(). '.' .$image->getClientOriginalExtension();
        //     Image::make($image)->resize(640, 425)->save(public_path('/uploads/clothes/'.$fileName));
        //     $cloth->image = $fileName;
        // };
        $cloth->save();
        return redirect('/clothes')->with('status', 'Cloth Added Successfully');
        
    }

    public function editCloth($id){
        $cloth = cloth::find($id);
        $users = User::where('role_as', '0')->get();
        return view('admin.clothes.edit-cloth', compact('cloth', 'users'));
    }

    public function updateCloth($id, Request $request){

        $cloth = cloth::find($id);
        $cloth->hexa_code = $request->input('hexa_code');
        $cloth->customer_id = $request->input('customer_id');
        $cloth->order_id = $request->input('order_id');
        $cloth->service_id = $request->input('service_id');
        $cloth->set_id = $request->input('set_id');
        // $cloth->cloth_type = $request->input('cloth_type');
        // $cloth->size = $request->input('size');
        // $cloth->color = $request->input('color');
        // $cloth->fabric = $request->input('fabric');
        // $cloth->weight = $request->input('weight');
        // $cloth->brand = $request->input('brand');
        // $cloth->cloth_status = '1';
        // if($request->hasFile('image')){
        //     $destination = 'upload/clothes/'.$cloth->image;
        //     if(File::exists($destination)){
        //         File::delete($destination);
        //     }
        //     $image = $request->file('image');
        //     $fileName = time(). '.' .$image->getClientOriginalExtension();
        //     Image::make($image)->resize(640, 425)->save(public_path('/uploads/clothes/'.$fileName));
        //     $cloth->image = $fileName;
        // };
        $cloth->update();
        return redirect('/clothes')->with('status', 'Cloth Updated Successfully');
    }

    public function deleteCloth($id){
        $cloth = cloth::find($id);
        $cloth->delete();
        return redirect('/clothes')->with('warning', 'Cloth Deleted Successfully');
    }

    public function getCustomerOrders(Request $request)
    {
        $orders=Order::where('customer_id', $request->customer_id)->orderBy('id')->get();
        return $orders;
    }

    public function getOrderServiceID(Request $request)
    {
        $service=Order::where('id', $request->order_id)->pluck('service_id');
        return $service;
    }
    

    public function updateSetServiceLocationStatus($id, Request $request)
    {
        $cloth = cloth::find($id);
        $cloth->wash_program_number = $request->input('wash_program_number');
        $cloth->update();
        return redirect('/clothes')->with('status', 'Service Location Status Updated');
    }

    // public function deactive($id)
    // {
    //     $cloth = cloth::find($id);
    //     $cloth->cloth_status = '0';
    //     $cloth->update();
    //     return redirect()->back()->with('warning', 'Item De-activated');
    // }
}
