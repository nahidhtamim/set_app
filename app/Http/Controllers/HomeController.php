<?php

namespace App\Http\Controllers;

use App\Models\Cloth;
use App\Models\laundry;
use App\Models\User;
use App\Models\Order;
use App\Models\Place;
use App\Models\Sport;
use App\Models\Locker;
use App\Models\OnlineStatus;
use App\Models\Service;
use App\Models\PlaceLocker;
use App\Models\PlaceService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpKernel\Profiler\Profile;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        return view('home');
    }

    public function status()
    {
        $hasOrder = DB::table('orders')->where('customer_id', Auth::user()->id)->where('order_status', '<', '12')->exists();
        $order = Order::where('customer_id', Auth::user()->id)->latest()->first();
        $cloth_set_one = Cloth::where('customer_id', Auth::user()->id)->where('order_id', $order->id)->where('set_id', '1')->first();
        $cloth_set_two = Cloth::where('customer_id', Auth::user()->id)->where('order_id', $order->id)->where('set_id', '2')->first();
        return view('frontend.status', compact('order', 'hasOrder', 'cloth_set_one', 'cloth_set_two'));
    }

    public function userOnline($id, $cloth_id)
    {
        $date = Carbon::today()->subDays(7);

        $count = OnlineStatus::where('customer_id', $id)
        ->where('created_at', '>=', $date)
        ->count();

        $basic = DB::table('orders')->where('customer_id', Auth::user()->id)->where('order_status', '<', '12')->where('service_id', '1')->exists();
        $pro = DB::table('orders')->where('customer_id', Auth::user()->id)->where('order_status', '<', '12')->where('service_id', '2')->exists();
        $ambition = DB::table('orders')->where('customer_id', Auth::user()->id)->where('order_status', '<', '12')->where('service_id', '3')->exists();

        if($basic == true && $count < 3){

            $user = User::findOrFail($id);
            $user->online_status = '1';
            $user->update();

            $os = new OnlineStatus();
            $os->online_status = '1';
            $os->customer_id = $id;
            $os->read_at = '0';
            $os->save();

            $cloth = Cloth::findOrFail($cloth_id);
            $cloth->wash_program_number = '4';
            $cloth->update();
    
            return redirect()->back()->with('status', 'User Online');
        }
        elseif($pro == true && $count < 5){

            $user = User::findOrFail($id);
            $user->online_status = '1';
            $user->update();

            $os = new OnlineStatus();
            $os->online_status = '1';
            $os->customer_id = $id;
            $os->read_at = '0';
            $os->save();

            $cloth = Cloth::findOrFail($cloth_id);
            $cloth->wash_program_number = '4';
            $cloth->update();
    
            return redirect()->back()->with('status', 'User Online');
        }
        elseif($ambition == true && $count < 7){

            $user = User::findOrFail($id);
            $user->online_status = '1';
            $user->update();

            $os = new OnlineStatus();
            $os->online_status = '1';
            $os->customer_id = $id;
            $os->read_at = '0';
            $os->save();

            $cloth = Cloth::findOrFail($cloth_id);
            $cloth->wash_program_number = '4';
            $cloth->update();
    
            return redirect()->back()->with('status', 'User Online');
        }
        else{
            return redirect()->back()->with('warning', 'You have already used this service maximum time this week');
        }

        
    }

    public function userOffline($id, $cloth_id)
    {
        $user = User::findOrFail($id);
        $user->online_status = '0';
        $user->update();

        $os = new OnlineStatus();
        $os->online_status = '0';
        $os->customer_id = $id;
        $os->read_at = '0';
        $os->save();

        $cloth = Cloth::findOrFail($cloth_id);
        $cloth->wash_program_number = '5';
        $cloth->update();

        return redirect()->back()->with('warning', 'User Offline');
    }

    public function myProfile()
    {
        $profile = User::find(Auth::user()->id);
        return view('frontend.profile', compact('profile'));
    }

    public function updateDetails(Request $request)
    {

        $this->validate($request, array(
            'phone' => 'required|numeric|min:5',
            'address' => 'required|string|max:191',
        ));

        $profile = User::find(Auth::user()->id);
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
        $profile->address = $request->input('address');
        if($request->hasFile('image')){
            $avatar = $request->file('image');
            $filename = time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/' . $filename));
            $profile->image = $filename;
            $profile->update();
        }
        $profile->update();
        return redirect()->back()->with('status', 'Profile Updated Successfully'); 
    }

    public function updatePassword(Request $request)
    {

        $this->validate($request, array(
            'password' => 'required|string|min:8|confirmed',
        ));

        $profile = User::find(Auth::user()->id);
        $profile->password = Hash::make($request->password);
        $profile->update();
        return redirect()->back()->with('status', 'Password Updated Successfully'); 
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
        $order = DB::table('orders AS o')
        ->where('customer_id', Auth::user()->id)
        ->where('order_status', '<=', 11)
        ->leftJoin('users as u', function($join)
        {
            $join->on('o.customer_id', '=', 'u.id');
        })
        ->leftJoin('sports AS sp', function($join)
        {
            $join->on('o.sport_id', '=', 'sp.id');
        })
        ->leftJoin('place_services AS ps', function($join)
        {
            $join->on('o.service_id', '=', 'ps.id');
        })
        ->leftJoin('services AS s', function($join)
        {
            $join->on('ps.service_id', '=', 's.id');
        })
        ->leftJoin('place_lockers AS pl', function($join)
        {
            $join->on('o.locker_id', '=', 'pl.id');
        })
        ->leftJoin('lockers AS l', function($join)
        {
            $join->on('pl.locker_id', '=', 'l.id');
        })
        ->leftJoin('order_statuses AS os', function($join)
        {
            $join->on('o.order_status', '=', 'os.id');
        })
        ->orderBy('o.id', 'DESC')
        ->first([
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
            'os.name As order_status_name',
        ]);
        $hasOrder = DB::table('orders')->where('customer_id', Auth::user()->id)->where('order_status', '<', '12')->exists();
        $cloths = Cloth::where('customer_id', Auth::user()->id)->where('order_id', $order->id)->get();
        $clothing_items = laundry::where('customer_id', Auth::user()->id)->where('order_id', $order->id)->get();
        return view('frontend.order', compact('order', 'cloths', 'hasOrder', 'clothing_items'));
    }

    public function saveOrder(Request $request)
    {
        $this->validate($request, array(
            'sport_id' => 'required|numeric',
            'place_id' => 'required|numeric',
            'service_id' => 'required|numeric',
            'locker_id' => 'required|numeric',
            'gender' => 'required',
            'dob' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'shipping_address' => 'required',
            'shipping_email' => 'required',
            'shipping_phone' => 'required',
            'billing_first_name' => 'required',
            'billing_last_name' => 'required',
            'billing_address' => 'required',
            'billing_phone' => 'required',
            'billing_email' => 'required',
        ));


        $order = new Order();
        $order->customer_id = Auth::user()->id;
        $order->sport_id = $request->input('sport_id');
        $order->place_id = $request->input('place_id');
        $order->service_id = $request->input('service_id');
        $order->locker_id = $request->input('locker_id');
        $order->gender = $request->input('gender');
        $order->dob = $request->input('dob');
        $order->shipping_name = $request->input('first_name')." ".$request->input('last_name');
        $order->shipping_address = $request->input('shipping_address');
        $order->shipping_phone = $request->input('shipping_phone');
        $order->shipping_email = $request->input('shipping_email');
        $order->billing_name = $request->input('billing_first_name')." ".$request->input('billing_last_name');
        $order->billing_address = $request->input('billing_address');
        $order->billing_phone = $request->input('billing_phone');
        $order->billing_email = $request->input('billing_email');
        $order->message = $request->input('message');
        $order->order_status = '0';
        $order->save();
        return redirect()->back()->with('status', 'Order Has Been Saved Successfully');
    }


    public function requestClosing($id)
    {
        $order = Order::find($id);
        $order->order_status = '9';
        $order->update();
        return redirect()->back()->with('status', 'Request Has Been Sent For Clossing The Order');
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
