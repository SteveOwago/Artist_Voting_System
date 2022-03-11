<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Phase;
use App\Models\Region;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
        $activities = Activity::all()->sortByDesc('id');

        $phases = Phase::all();

        return view('activities.index', compact('activities', 'phases'));
    }

    public function create(){
        $regions = Region::all();
        $phases = Phase::where('status',1)->get();

        return view('activities.create', compact('regions','phases'));
    }

    public function store(Request $request){
        $request->validate([
                'title' => 'required|max:255',
                'status' => 'required|integer',
                'start_date' => 'required|string',
                'end_date' => 'required|string',
                'region_id' => 'required|integer',
                'venue' => 'required|string',
                'phase_id' => 'required|integer',
            ]);

        Activity::create($request->all());

        return back()->with('message', 'Activity Created Successfull');
    }

    public function activityEdit($id){

        $activity = Activity::findOrFail($id);
        $regions = Region::all();
        $phases = Phase::where('status',1)->get();
        return view('activities.edit', compact('activity','regions','phases'));
    }

    public function show($id){

        $activity = Activity::findOrFail($id);

        return view('activities.show', compact('activity'));
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
           'venue' => $request->venue,
           'region_id'=>$request->region_id,
           'start_date' => $request->start_date,
           'end_date' => $request->end_date,
       ]);

       return back()->with('message', 'Activity Updated Successfully');
    }
    public function delete_activity($id)
    {

        $activity = Activity::findOrFail($id);

        $activity->delete();


        return back()->with('message', 'Operation Successful');
    }
}
