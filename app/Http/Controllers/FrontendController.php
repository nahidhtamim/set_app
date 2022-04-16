<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function index()
    {
        $services = Service::all();
        return view('frontend.index', compact('services'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function service($id)
    {
        $service = Service::find($id);
        return view('frontend.service', compact('service'));
    }
}
