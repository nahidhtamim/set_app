<?php

namespace App\Http\Controllers\Admin;

use App\Models\Place;
use App\Models\Service;
use App\Models\PlaceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class placeServicesController extends Controller
{
    public function index(){
        $placeServices = placeService::all();
        $places = Place::all();
        $services = Service::all();
        return view('admin.placeService.index', compact('placeServices', 'places', 'services'));
    }

    public function addPlaceService(){
        $places = Place::all();
        $services = Service::all();
        return view('admin.placeService.add-place-service', compact('places', 'services'));
    }


    public function savePlaceService(Request $request)
    {
        $place_id = $request->place_id;
        $service_id = $request->service_id;
        $name = $request->name;
        $code = $request->code;
        $status = '1';
        // $selection_id = $$selection->id;
        for($i = 0; $i < count($name); $i++){
            $datasave = [
                'place_id' => $place_id[$i],
                'service_id' => $service_id[$i],
                'name' => $name[$i],
                'code' => $code[$i],
                'status' => $status[$i],
            ];
            DB::table('place_services')->insert($datasave);
        }
        return redirect('/place-services')->with('status', 'Data has been submitted Successfully');

    }


    public function editPlaceService($id){
        $placeService = PlaceService::find($id);
        $places = Place::all();
        $services = Service::all();
        return view('admin.placeService.edit-place-service', compact('placeService', 'places', 'services'));
    }

    public function updatePlaceService($id, Request $request){
        $placeService = PlaceService::find($id);
        $placeService->place_id = $request->input('place_id');
        $placeService->service_id = $request->input('service_id');
        $placeService->name = $request->input('name');
        $placeService->code = $request->input('code');
        $placeService->update();
        return redirect('/place-services')->with('status', 'Place Service Updated Successfully');
    }

    public function deletePlaceService($id){
        $placeService = PlaceService::find($id);
        $placeService->delete();
        return redirect('/place-services')->with('warning', 'Place Service Deleted Successfully');
    }

    public function active($id)
    {
        $placeService = PlaceService::find($id);
        $placeService->status = '1';
        $placeService->update();
        return redirect()->back()->with('status', 'Item Activated');
    }

    public function deactive($id)
    {
        $placeService = PlaceService::find($id);
        $placeService->status = '0';
        $placeService->update();
        return redirect()->back()->with('warning', 'Item De-activated');
    }
}
