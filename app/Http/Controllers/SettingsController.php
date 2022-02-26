<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
        $activities = Activity::all();

        return view('activities.index', compact('activities'));
    }

    public function activityEdit($id){

        $activity = Activity::findOrFail($id);
        return view('activities.edit', compact('activity'));
    }

    public function activityUpdate(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'start_date'=>'required',
            'end_date'=>'required',
       ]);

       $activity = Activity::findOrFail($id);

       $activity->update([
           'title' => $request->title,
           'start_date' => $request->start_date,
           'end_date' => $request->end_date,
       ]);

       return back()->with('message', 'Activity Updated Successfully');
    }
}
