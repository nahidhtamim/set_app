<?php

namespace App\Http\Controllers\Admin;

use App\Models\OrderPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{

    public function index($id){
        $ops = OrderPayment::get()->where('order_id', $id);
        return view('admin.orders.order-payments', compact('ops'));
    }
    public function savePayment(Request $request){

        $details = [
            'title' => 'Mail from SET.com',
            'month' => $request->input('month'),
            'invoice_no' => $request->input('invoice_no'),
            's_name' => $request->input('s_name'),
            's_price' => $request->input('s_price'),
            'ps_name' => $request->input('ps_name'),
            'ps_code' => $request->input('ps_code'),
            'l_name' => $request->input('l_name'),
            'pl_name' => $request->input('pl_name'),
            'pl_code' => $request->input('pl_code'),
            'sport_name' => $request->input('sport_name'),
            'shipping_name' => $request->input('shipping_name'),
            'shipping_email' => $request->input('shipping_email'),
            'shipping_phone' => $request->input('shipping_phone'),
            'shipping_address' => $request->input('shipping_address'),
            'billing_name' => $request->input('billing_name'),
            'billing_email' => $request->input('billing_email'),
            'billing_phone' => $request->input('billing_phone'),
            'billing_address' => $request->input('billing_address'),
            'message' => $request->input('message'),
            'create_date' => $request->input('create_date'),
            'update_date' => $request->input('update_date'),
        ];


        $user = $request->input('billing_email');

        $op = new OrderPayment();
        $op->customer_id = $request->input('customer_id');
        $op->order_id = $request->input('order_id');
        $op->month = $request->input('month');
        $op->year = $request->input('year');
        $op->save();
        Mail::to($user)->send(new \App\Mail\InvoiceMail($details));
        return redirect('/orders')->with('status', 'Payment Added Successfully');
    }

    public function paymentDetails($id){
        $op = DB::table('order_payments AS opy')
        ->join('orders AS o', 'opy.order_id', '=', 'o.id')
        ->join('users AS u', 'o.customer_id', '=', 'u.id')
        ->join('sports AS sp', 'o.sport_id', '=', 'sp.id')
        ->join('place_services AS ps', 'o.service_id', '=', 'ps.id')
        ->join('services AS s', 'ps.service_id', '=', 's.id')
        ->join('place_lockers AS pl', 'o.locker_id', '=', 'pl.id')
        ->join('lockers AS l', 'pl.locker_id', '=', 'l.id')
        ->where('opy.id', $id)
        ->select([
            'opy.*',
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
        ])->first();
        return view('admin.orders.payment-invoice', compact('op'));
    }

    // public function editPayment($id){
    //     $order = DB::table('order_payments AS op')
    //     ->join('orders AS o', 'o.id', '=', 'op.order_id')
    //     ->join('users AS u', 'o.customer_id', '=', 'u.id')
    //     ->join('sports AS sp', 'o.sport_id', '=', 'sp.id')
    //     ->join('place_services AS ps', 'o.service_id', '=', 'ps.id')
    //     ->join('services AS s', 'ps.service_id', '=', 's.id')
    //     ->join('place_lockers AS pl', 'o.locker_id', '=', 'pl.id')
    //     ->join('lockers AS l', 'pl.locker_id', '=', 'l.id')
    //     ->where('op.id', $id)
    //     ->select([
    //         'op.*',
    //         'o.*',
    //         'u.name As u_name',
    //         'sp.*',
    //         's.service_name As s_name',
    //         's.service_price As s_price',
    //         'ps.name As ps_name',
    //         'ps.code As ps_code',
    //         'l.locker_name As l_name',
    //         'pl.name As pl_name',
    //         'pl.code As pl_code',
    //     ])->get();
    //     //$order = OrderPayment::find($id);
    //     //$order = DB::table('order_payments AS op')->where('op.id', $id)->get(['op.*']);
    //     return view('admin.orders.edit-payment', compact('order'));
    // }

    // public function updatePayment($id, Request $request){

    //     $details = [
    //         'title' => 'Mail from SET.com',
    //         'month' => $request->input('month'),
    //         'invoice_no' => $request->input('invoice_no'),
    //         's_name' => $request->input('s_name'),
    //         's_price' => $request->input('s_price'),
    //         'ps_name' => $request->input('ps_name'),
    //         'ps_code' => $request->input('ps_code'),
    //         'l_name' => $request->input('l_name'),
    //         'pl_name' => $request->input('pl_name'),
    //         'pl_code' => $request->input('pl_code'),
    //         'sport_name' => $request->input('sport_name'),
    //         'shipping_name' => $request->input('shipping_name'),
    //         'shipping_email' => $request->input('shipping_email'),
    //         'shipping_phone' => $request->input('shipping_phone'),
    //         'shipping_address' => $request->input('shipping_address'),
    //         'billing_name' => $request->input('billing_name'),
    //         'billing_email' => $request->input('billing_email'),
    //         'billing_phone' => $request->input('billing_phone'),
    //         'billing_address' => $request->input('billing_address'),
    //         'message' => $request->input('message'),
    //         'create_date' => $request->input('create_date'),
    //         'update_date' => $request->input('update_date'),
    //     ];


    //     $user = $request->input('billing_email');

    //     $op = OrderPayment::find($id);
    //     $op->customer_id = $request->input('customer_id');
    //     $op->order_id = $request->input('order_id');
    //     $op->month = $request->input('month');
    //     $op->year = $request->input('year');
    //     $op->update();
    //     Mail::to($user)->send(new \App\Mail\InvoiceMail($details));
    //     return redirect('/orders')->with('status', 'Payment Added Successfully');
    // }


    public function deletePayment($id){
        $op = OrderPayment::find($id);
        $op->delete();
        return redirect()->back()->with('warning', 'Item Deleted Successfully');
    }
}
