<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index(){
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function addService(){
        return view('admin.services.add-service');
    }

    public function saveService(Request $request){
        $service = new Service();
        $service->service_name = $request->input('service_name');
        $service->service_price = $request->input('service_price');
        $service->service_description = $request->input('service_description');
        $service->service_status = $request->input('service_status');
        $service->save();
        return redirect('/services')->with('status', 'Service Added Successfully');
    }

    public function editService($id){
        $service = Service::find($id);
        return view('admin.services.edit-service', compact('service'));
    }

    public function updateService($id, Request $request){
        $service = Service::find($id);
        $service->service_name = $request->input('service_name');
        $service->service_price = $request->input('service_price');
        $service->service_description = $request->input('service_description');
        $service->service_status = $request->input('service_status');
        $service->update();
        return redirect('/services')->with('status', 'Service Updated Successfully');
    }

    public function deleteService($id, Request $request){
        $service = Service::find($id);
        $service->delete();
        return redirect('/services')->with('warning', 'Service Deleted Successfully');
    }
}
