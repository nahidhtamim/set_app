<?php

namespace App\Http\Controllers\Admin;

use App\Models\Locker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LockersController extends Controller
{
    public function index(){
        $lockers = Locker::all();
        return view('admin.lockers.index', compact('lockers'));
    }

    public function addLocker(){
        return view('admin.lockers.add-locker');
    }

    public function saveLocker(Request $request){
        $locker = new Locker();
        $locker->locker_name = $request->input('locker_name');
        $locker->locker_size = $request->input('locker_size');
        $locker->locker_description = $request->input('locker_description');
        $locker->locker_status = '1';
        $locker->save();
        return redirect('/lockers')->with('status', 'Locker Added Successfully');
    }

    public function editLocker($id){
        $locker = Locker::find($id);
        return view('admin.lockers.edit-locker', compact('locker'));
    }

    public function updateLocker($id, Request $request){
        $locker = Locker::find($id);
        $locker->locker_name = $request->input('locker_name');
        $locker->locker_size = $request->input('locker_size');
        $locker->locker_description = $request->input('locker_description');
        $locker->update();
        return redirect('/lockers')->with('status', 'Locker Updated Successfully');
    }

    public function deleteLocker($id, Request $request){
        $locker = Locker::find($id);
        $locker->delete();
        return redirect('/lockers')->with('warning', 'Locker Deleted Successfully');
    }

    public function active($id)
    {
        $locker = Locker::find($id);
        $locker->locker_status = '1';
        $locker->update();
        return redirect()->back()->with('status', 'Item Activated');
    }

    public function deactive($id)
    {
        $locker = Locker::find($id);
        $locker->locker_status = '0';
        $locker->update();
        return redirect()->back()->with('warning', 'Item De-activated');
    }
}
