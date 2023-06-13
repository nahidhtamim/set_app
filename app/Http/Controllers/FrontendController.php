<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{

    public function index()
    {
        $services = Service::all();
        return view('frontend.index', compact('services'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function service($id)
    {
        $service = Service::find($id);
        $hasOrder = DB::table('orders')->where('customer_id', Auth::user()->id)->where('order_status', '<', '12')->exists();
        return view('frontend.service', compact('service', 'hasOrder'));
    }
}
