<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;


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
        $service->service_name_ger = $request->input('service_name_ger');
        $service->service_price = $request->input('service_price');
        $service->short_desc = $request->input('short_desc');
        $service->short_desc_ger = $request->input('short_desc_ger');
        $service->long_desc = $request->input('long_desc');
        $service->long_desc_ger = $request->input('long_desc_ger');
        $service->service_status = '1';
        if($request->hasFile('service_image')){
            $service_image = $request->file('service_image');
            $fileName = time(). '.' .$service_image->getClientOriginalExtension();
            Image::make($service_image)->resize(640, 425)->save(public_path('/uploads/services/'.$fileName));
            $service->service_image = $fileName;
            $service->save();
        };
        return redirect('/services')->with('status', 'Service Added Successfully');
        
    }

    public function editService($id){
        $service = Service::find($id);
        return view('admin.services.edit-service', compact('service'));
    }

    public function updateService($id, Request $request){
        $service = Service::find($id);
        $service->service_name = $request->input('service_name');
        $service->service_name_ger = $request->input('service_name_ger');
        $service->service_price = $request->input('service_price');
        $service->short_desc = $request->input('short_desc');
        $service->short_desc_ger = $request->input('short_desc_ger');
        $service->long_desc = $request->input('long_desc');
        $service->long_desc_ger = $request->input('long_desc_ger');
        if($request->hasFile('service_image')){
            $service_image = $request->file('service_image');
            $fileName = time(). '.' .$service_image->getClientOriginalExtension();
            Image::make($service_image)->resize(640, 425)->save(public_path('/uploads/services/'.$fileName));
            $service->service_image = $fileName;
            $service->update();
        };
        return redirect('/services')->with('status', 'Service Updated Successfully');
    }

    public function deleteService($id, Request $request){
        $service = Service::find($id);
        $service->delete();
        return redirect('/services')->with('warning', 'Service Deleted Successfully');
    }


    public function active($id)
    {
        $service = Service::find($id);
        $service->service_status = '1';
        $service->update();
        return redirect()->back()->with('status', 'Item Activated');
    }

    public function deactive($id)
    {
        $service = Service::find($id);
        $service->service_status = '0';
        $service->update();
        return redirect()->back()->with('warning', 'Item De-activated');
    }
}
