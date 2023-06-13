<?php

namespace App\Http\Controllers\Admin;

use App\Models\Place;
use App\Models\Locker;
use App\Models\Service;
use App\Models\PlaceLocker;
use App\Models\PlaceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PlaceLockersController extends Controller
{
    public function index(){
        $placeLockers = PlaceLocker::all();
        $places = Place::all();
        $services = Service::all();
        $lockers = Locker::all();
        return view('admin.placeLocker.index', compact('placeLockers', 'places', 'services', 'lockers'));
    }

    public function addPlaceLocker(){
        $places = Place::all();
        $services = PlaceService::all();
        $lockers = Locker::all();
        return view('admin.placeLocker.add-place-locker', compact('places', 'services', 'lockers'));
    }


    public function savePlaceLocker(Request $request)
    {
        $place_id = $request->place_id;
        $service_id = $request->service_id;
        $locker_id = $request->locker_id;
        $name = $request->name;
        $code = $request->code;
        $storage_name = $request->storage_name;
        $status = $request->status;
        // $selection_id = $$selection->id;
        for($i = 0; $i < count($name); $i++){
            $datasave = [
                'place_id' => $place_id[$i],
                'service_id' => $service_id[$i],
                'locker_id' => $locker_id[$i],
                'name' => $name[$i],
                'code' => $code[$i],
                'storage_name' => $storage_name[$i],
                'status' => $status[$i],
            ];
            DB::table('place_lockers')->insert($datasave);
        }

        return redirect('/place-lockers')->with('status', 'Data has been submitted Successfully');

    }


    public function editPlaceLocker($id){
        $placeLocker = PlaceLocker::find($id);
        $places = Place::all();
        $services = PlaceService::all();
        $lockers = Locker::all();
        return view('admin.placeLocker.edit-place-locker', compact('placeLocker', 'places', 'services', 'lockers'));
    }

    public function updatePlaceLocker($id, Request $request){
        $placeLocker = PlaceLocker::find($id);
        $placeLocker->place_id = $request->input('place_id');
        $placeLocker->service_id = $request->input('service_id');
        $placeLocker->locker_id = $request->input('locker_id');
        $placeLocker->name = $request->input('name');
        $placeLocker->code = $request->input('code');
        $placeLocker->storage_name = $request->input('storage_name');
        $placeLocker->update();
        return redirect('/place-lockers')->with('status', 'Place Locker Updated Successfully');
    }

    public function deletePlaceLocker($id){
        $placeLocker = PlaceLocker::find($id);
        $placeLocker->delete();
        return redirect('/place-lockers')->with('warning', 'Place Locker Deleted Successfully');
    }


    public function getPlaceServices(Request $request)
    {
        $placeService=PlaceService::where('place_id', $request->place_id)->orderBy('name')->get();
        return $placeService;
    }


    public function active($id)
    {
        $placeLocker = PlaceLocker::find($id);
        $placeLocker->status = '1';
        $placeLocker->update();
        return redirect()->back()->with('status', 'Item Activated');
    }

    public function deactive($id)
    {
        $placeLocker = PlaceLocker::find($id);
        $placeLocker->status = '0';
        $placeLocker->update();
        return redirect()->back()->with('warning', 'Item De-activated');
    }
}
