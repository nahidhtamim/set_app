<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){
        $orders = DB::table('orders AS o')
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
        return view('admin.orders.index', compact('orders'));
    }
}
