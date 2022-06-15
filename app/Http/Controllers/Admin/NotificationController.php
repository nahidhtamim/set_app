<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OnlineStatus;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(){
        $read = OnlineStatus::get()->where('read_at', '1');
        $unread = OnlineStatus::get()->where('read_at', '0');
        return view('admin.notifications.index', compact('read', 'unread'));
    }

    public function readStatus($id)
    {
        $os = OnlineStatus::find($id);
        $os->read_at = '1';
        $os->update();
        return redirect()->back()->with('status', 'Item Read');
    }

    public function deleteStatus($id)
    {
        $os = OnlineStatus::find($id);
        $os->delete();
        return redirect()->back()->with('warning', 'Item Deleted');
    }
    
}
