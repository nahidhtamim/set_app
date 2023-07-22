<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\service_cycle_location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceCycleStatusController extends Controller
{
    public function index(){
        $scl = DB::table('service_cycle_locations AS scl')
        ->get([
            'scl.id as id',
            'scl.location as status',
        ]);
        return response()->json([
            'status' => 200,
            'service_cycle_location' => $scl
        ], 200);
    }
}
