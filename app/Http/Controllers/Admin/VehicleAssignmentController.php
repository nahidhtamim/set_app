<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\vehicle;
use App\Models\vehicle_assignment;
use Illuminate\Http\Request;

class VehicleAssignmentController extends Controller
{
    public function index(){
        $assignments = vehicle_assignment::all();
        return view('admin.vehicle-assignments.index', compact('assignments'));
    }

    public function addVehicleAssignment(){
        $vehicles = vehicle::where('vehicle_status', 1)->get();
        $places = Place::where('place_status', 1)->get();
        return view('admin.vehicle-assignments.add-vehicle-assignment', compact('vehicles', 'places'));
    }

    public function saveVehicleAssignment(Request $request){
        $assignment = new vehicle_assignment();
        $assignment->vehicle_id = $request->input('vehicle_id');
        $assignment->place_id = $request->input('place_id');
        $assignment->assignment_details = $request->input('assignment_details');
        $assignment->assignment_status = $request->input('assignment_status');
        $assignment->save();
        return redirect('/vehicle-assignments')->with('status', 'Assignment Added Successfully');
    }

    public function editVehicleAssignment($id){
        $assignment = vehicle_assignment::find($id);
        $vehicles = vehicle::where('vehicle_status', 1)->get();
        $places = Place::where('place_status', 1)->get();
        return view('admin.vehicle-assignments.edit-vehicle-assignment', compact('assignment', 'vehicles', 'places'));
    }

    public function updateVehicleAssignment($id, Request $request){
        $assignment = vehicle_assignment::find($id);
        $assignment->vehicle_id = $request->input('vehicle_id');
        $assignment->place_id = $request->input('place_id');
        $assignment->assignment_details = $request->input('assignment_details');
        $assignment->update();
        return redirect('/vehicle-assignments')->with('status', 'Assignment Updated Successfully');
    }

    public function deleteVehicleAssignment($id, Request $request){
        $assignment = vehicle_assignment::find($id);
        $assignment->delete();
        return redirect('/vehicle-assignments')->with('warning', 'Assignment Deleted Successfully');
    }

    public function runningVehicleAssignment($id)
    {
        $assignment = vehicle_assignment::find($id);
        $assignment->assignment_status = '1';
        $assignment->update();
        return redirect()->back()->with('warning', 'Task Running');
    }

    public function completeVehicleAssignment($id)
    {
        $assignment = vehicle_assignment::find($id);
        $assignment->assignment_status = '2';
        $assignment->update();
        return redirect()->back()->with('status', 'Task Completed');
    }
}
