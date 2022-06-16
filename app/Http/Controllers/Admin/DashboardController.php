<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Place;
use App\Models\Sport;
use App\Models\Locker;
use App\Models\Service;
use App\Models\PlaceLocker;
use App\Models\PlaceService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $users = User::get();
        $places = Place::get();
        $services = Service::get();
        $lockers = Locker::get();
        $placeServices = PlaceService::get();
        $placeLockers = PlaceLocker::get();
        $sports = Sport::get();
        $orders = Order::orderBy('id', 'desc')->take(10)->get();
        return view('admin.dashboard', compact('users', 'places', 'services', 'lockers', 'placeServices', 'placeLockers', 'sports', 'orders'));
    }
}
