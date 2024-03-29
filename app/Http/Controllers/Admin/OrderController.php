<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Place;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\order_status;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){

        $orders = DB::table('orders AS o')
        ->distinct()
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
            'os.name As order_status_name',
        ]);
        $order_statuses = order_status::all();
        return view('admin.orders.index', compact('orders', 'order_statuses'));
    }

    public function editOrder($id)
    {
        $order = Order::find($id);
        $places = Place::all();
        $sports = Sport::all();
        return view('admin.orders.edit-order', compact('places', 'order', 'sports'));
    }

    public function updateOrder($id, Request $request)
    {
        $order = Order::find($id);
        $order->sport_id = $request->input('sport_id');
        $order->place_id = $request->input('place_id');
        $order->service_id = $request->input('service_id');
        $order->locker_id = $request->input('locker_id');
        $order->dob = $request->input('dob');
        $order->gender = $request->input('gender');
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
        $order->update();
        return redirect()->back()->with('status', 'Order Has Been Updated Successfully');
    }

    public function orderStatusChange($id, Request $request)
    {
        $order = Order::find($id);
        $order->order_status = $request->order_status;
        $order->update();
        return redirect()->back()->with('status', 'Order Status Has Been Updated');
    }

    // public function closingRequest($id)
    // {
    //     $order = Order::find($id);
    //     $order->order_status = '2';
    //     $order->update();
    //     return redirect()->back()->with('status', 'Request Has Been Sent For Clossing The Order');
    // }

    // public function orderActive($id)
    // {
    //     $order = Order::find($id);
    //     $order->order_status = '1';
    //     $order->update();
    //     return redirect()->back()->with('status', 'Order Activated');
    // }

    // public function orderClose($id)
    // {
    //     $order = Order::find($id);
    //     $order->order_status = '3';
    //     $order->update();
    //     return redirect()->back()->with('status', 'Order Closed');
    // }
    
    public function deleteOrder($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->back()->with('warning', 'Order Has Been Deleted');
    }
}
