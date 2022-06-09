<?php

namespace App\Http\Controllers\Admin;

use App\Models\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlacesController extends Controller
{
    public function index(){
        $places = Place::all();
        return view('admin.places.index', compact('places'));
    }

    public function addPlace(){
        return view('admin.places.add-place');
    }

    public function savePlace(Request $request){
        $place = new Place();
        $place->place_name = $request->input('place_name');
        $place->place_description = $request->input('place_description');
        $place->place_status = '1';
        $place->save();
        return redirect('/places')->with('status', 'Place Added Successfully');
    }

    public function editPlace($id){
        $place = Place::find($id);
        return view('admin.places.edit-place', compact('place'));
    }

    public function updatePlace($id, Request $request){
        $place = Place::find($id);
        $place->place_name = $request->input('place_name');
        $place->place_description = $request->input('place_description');
        $place->update();
        return redirect('/places')->with('status', 'Place Updated Successfully');
    }

    public function deletePlace($id, Request $request){
        $place = Place::find($id);
        $place->delete();
        return redirect('/places')->with('warning', 'Place Deleted Successfully');
    }

    public function active($id)
    {
        $place = Place::find($id);
        $place->place_status = '1';
        $place->update();
        return redirect()->back()->with('status', 'Item Activated');
    }

    public function deactive($id)
    {
        $place = Place::find($id);
        $place->place_status = '0';
        $place->update();
        return redirect()->back()->with('warning', 'Item De-activated');
    }
}
