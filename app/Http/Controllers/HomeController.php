<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Sport;
use App\Models\Locker;
use App\Models\Service;
use App\Models\PlaceLocker;
use App\Models\PlaceService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        return view('home');
    }


    public function orderForm()
    {
        // $services = PlaceService::all();
        $places = Place::all();
        // $lockers = PlaceLocker::all();
        $sports = Sport::all();
        return view('frontend.order-form', compact('places', 'sports'));
        //return view('frontend.order-form', compact('services', 'places', 'lockers', 'sports'));
    }


    public function getServices(Request $request)
    {
        $placeService=PlaceService::where('place_id', $request->place_id)->orderBy('name')->get();
        return $placeService;
    }

    public function getLockers(Request $request)
    {
        $serviceLocker=PlaceLocker::where('service_id', $request->service_id)->orderBy('name')->get();
        return $serviceLocker;
    }
}
