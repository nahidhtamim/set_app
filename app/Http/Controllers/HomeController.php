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


    public function saveOrder(Request $request)
    {
        $order = new Order();
        $order->place_id = $request->input('place_id');
        $order->place_id = $request->input('place_id');
        $order->locker_size = $request->input('locker_size');
        $order->locker_description = $request->input('locker_description');
        $order->locker_status = $request->input('locker_status');
        $order->save();
        return redirect('/lockers')->with('status', 'locker Added Successfully');
    }


    public function getServices(Request $request)
    {
        //$placeService=PlaceService::where('place_id', $request->place_id)->orderBy('name')->get();
        $placeService=PlaceService::where('place_id', $request->place_id)
                        ->join('services', 'place_services.service_id', '=', 'services.id')
                        ->orderBy('name')->get(['place_services.*', 'services.*']);

        // users = User::join('posts', 'users.id', '=', 'posts.user_id')
        //        ->get(['users.*', 'posts.descrption']);

        return $placeService;
    }

    public function getLockers(Request $request)
    {
        //$serviceLocker=PlaceLocker::where('service_id', $request->service_id)->orderBy('name')->get();

        $serviceLocker=PlaceLocker::where('service_id', $request->service_id)
        ->join('services', 'place_lockers.service_id', '=', 'services.id')
        ->orderBy('name')->get(['place_lockers.*', 'services.*']);


        return $serviceLocker;
    }

    public function getInfo(Request $request)
    {
        //$serviceLocker=PlaceLocker::where('service_id', $request->service_id)->orderBy('name')->get();

        $info=PlaceLocker::where('id', $request->locker_id)
        ->join('services', 'place_lockers.service_id', '=', 'services.id')
        ->orderBy('name')->get(['place_lockers.*', 'services.*']);

        return $info;
    }
}
