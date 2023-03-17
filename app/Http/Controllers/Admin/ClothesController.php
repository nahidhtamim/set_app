<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cloth;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ClothesController extends Controller
{
    public function index(){
        $clothes = Cloth::all();
        return view('admin.clothes.index', compact('clothes'));
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
        $cloth->size = $request->input('size');
        $cloth->color = $request->input('color');
        $cloth->fabric = $request->input('fabric');
        $cloth->weight = $request->input('weight');
        $cloth->brand = $request->input('brand');
        $cloth->wash_program_number = $request->input('wash_program_number')==true ? '1':'0';
        $cloth->dryer_program_number = $request->input('dryer_program_number')==true ? '1':'0';
        // $cloth->cloth_status = '1';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = time(). '.' .$image->getClientOriginalExtension();
            Image::make($image)->resize(640, 425)->save(public_path('/uploads/clothes/'.$fileName));
            $cloth->image = $fileName;
        };
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
        $cloth->size = $request->input('size');
        $cloth->color = $request->input('color');
        $cloth->fabric = $request->input('fabric');
        $cloth->weight = $request->input('weight');
        $cloth->brand = $request->input('brand');
        // $cloth->cloth_status = '1';
        if($request->hasFile('image')){
            $destination = 'upload/clothes/'.$cloth->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $image = $request->file('image');
            $fileName = time(). '.' .$image->getClientOriginalExtension();
            Image::make($image)->resize(640, 425)->save(public_path('/uploads/clothes/'.$fileName));
            $cloth->image = $fileName;
        };
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

    // public function active($id)
    // {
    //     $cloth = cloth::find($id);
    //     $cloth->cloth_status = '1';
    //     $cloth->update();
    //     return redirect()->back()->with('status', 'Item Activated');
    // }

    // public function deactive($id)
    // {
    //     $cloth = cloth::find($id);
    //     $cloth->cloth_status = '0';
    //     $cloth->update();
    //     return redirect()->back()->with('warning', 'Item De-activated');
    // }
}
