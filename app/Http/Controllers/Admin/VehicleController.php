<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(){
        $vehicles = vehicle::all();
        return view('admin.vehicle.index', compact('vehicles'));
    }

    public function addVehicle(){
        return view('admin.vehicle.add-vehicle');
    }

    public function saveVehicle(Request $request){
        $vehicle = new vehicle();
        $vehicle->vehicle_number = $request->input('vehicle_number');
        $vehicle->vehicle_name = $request->input('vehicle_name');
        $vehicle->vehicle_description = $request->input('vehicle_description');
        $vehicle->vehicle_status = $request->input('vehicle_status');
        $vehicle->save();
        return redirect('/vehicles')->with('status', 'Vehicle Added Successfully');
    }

    public function editVehicle($id){
        $vehicle = vehicle::find($id);
        return view('admin.vehicle.edit-vehicle', compact('vehicle'));
    }

    public function updateVehicle($id, Request $request){
        $vehicle = vehicle::find($id);
        $vehicle->vehicle_number = $request->input('vehicle_number');
        $vehicle->vehicle_name = $request->input('vehicle_name');
        $vehicle->vehicle_description = $request->input('vehicle_description');
        $vehicle->update();
        return redirect('/vehicles')->with('status', 'Vehicle Updated Successfully');
    }

    public function deleteVehicle($id, Request $request){
        $vehicle = vehicle::find($id);
        $vehicle->delete();
        return redirect('/vehicles')->with('warning', 'Vehicle Deleted Successfully');
    }

    public function activeVehicle($id)
    {
        $vehicle = vehicle::find($id);
        $vehicle->vehicle_status = '1';
        $vehicle->update();
        return redirect()->back()->with('status', 'Item Activated');
    }

    public function deactiveVehicle($id)
    {
        $vehicle = vehicle::find($id);
        $vehicle->vehicle_status = '0';
        $vehicle->update();
        return redirect()->back()->with('warning', 'Item De-activated');
    }
}
