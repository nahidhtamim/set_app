<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SportsController extends Controller
{
    public function index(){
        $sports = Sport::all();
        return view('admin.sports.index', compact('sports'));
    }

    public function addSport(){
        return view('admin.sports.add-sport');
    }

    public function saveSport(Request $request){
        $sport = new Sport();
        $sport->sport_name = $request->input('sport_name');
        $sport->sport_description = $request->input('sport_description');
        $sport->sport_status = $request->input('sport_status');
        $sport->save();
        return redirect('/sports')->with('status', 'Sport Added Successfully');
    }

    public function editSport($id){
        $sport = Sport::find($id);
        return view('admin.sports.edit-sport', compact('sport'));
    }

    public function updateSport($id, Request $request){
        $sport = Sport::find($id);
        $sport->sport_name = $request->input('sport_name');
        $sport->sport_description = $request->input('sport_description');
        $sport->sport_status = $request->input('sport_status');
        $sport->update();
        return redirect('/sports')->with('status', 'sport Updated Successfully');
    }

    public function deleteSport($id, Request $request){
        $sport = Sport::find($id);
        $sport->delete();
        return redirect('/sports')->with('warning', 'sport Deleted Successfully');
    }
}
