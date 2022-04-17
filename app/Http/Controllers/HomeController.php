<?php

namespace App\Http\Controllers;

use App\Models\Locker;
use App\Models\Place;
use App\Models\Service;
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


    public function orderForm($id)
    {
        $service = Service::find($id);
        $places = Place::all();
        $lockers = Locker::all();
        return view('frontend.order-form', compact('service', 'places', 'lockers'));
    }
}
