<?php

namespace App\Http\Controllers\Admin;

use App\Models\OrderPayment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function savePayment(Request $request){

        $details = [
            'title' => 'Mail from SET.com',
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
}
