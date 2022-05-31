<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Place;
use App\Models\Sport;
use App\Models\Locker;
use App\Models\Service;
use App\Models\PlaceLocker;
use App\Models\PlaceService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

    public function myProfile()
    {
        $profile = User::find(Auth::user()->id);
        return view('frontend.profile', compact('profile'));
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

    public function myOrders()
    {
        // $orders = Order::get()->where('customer_id', Auth::user()->id);
        $orders = DB::table('orders AS o')
        ->where('customer_id', Auth::user()->id)
        ->join('users AS u', 'o.customer_id', '=', 'u.id')
        ->join('sports AS sp', 'o.sport_id', '=', 'sp.id')
        ->join('place_services AS ps', 'o.service_id', '=', 'ps.id')
        ->join('services AS s', 'ps.service_id', '=', 's.id')
        ->join('place_lockers AS pl', 'o.locker_id', '=', 'pl.id')
        ->join('lockers AS l', 'pl.locker_id', '=', 'l.id')
        ->get([
            'o.*',
            'u.name As u_name',
            'sp.*',
            's.service_name As s_name',
            's.service_price As s_price',
            'ps.name As ps_name',
            'ps.code As ps_code',
            'l.locker_name As l_name',
            'pl.name As pl_name',
            'pl.code As pl_code',
        ]);

        return view('frontend.order', compact('orders'));
    }

    public function saveOrder(Request $request)
    {
        $order = new Order();
        $order->customer_id = Auth::user()->id;
        $order->sport_id = $request->input('sport_id');
        $order->place_id = $request->input('place_id');
        $order->service_id = $request->input('service_id');
        $order->locker_id = $request->input('locker_id');
        $order->shipping_name = $request->input('shipping_name');
        $order->shipping_address = $request->input('shipping_address');
        $order->shipping_phone = $request->input('shipping_phone');
        $order->shipping_email = $request->input('shipping_email');
        $order->billing_name = $request->input('billing_name');
        $order->billing_address = $request->input('billing_address');
        $order->billing_phone = $request->input('billing_phone');
        $order->billing_email = $request->input('billing_email');
        $order->message = $request->input('message');
        $order->order_status = '1';
        $order->save();
        return redirect()->back()->with('status', 'Order Has Been Saved Successfully');
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
        $serviceLocker=PlaceLocker::where('service_id', $request->service_id)->orderBy('name')->get();

        // $serviceLocker=PlaceLocker::where('service_id', $request->service_id)
        // ->join('lockers', 'place_lockers.locker_id', '=', 'lockers.id')
        // ->orderBy('name')->get(['place_lockers.*', 'lockers.*']);


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
