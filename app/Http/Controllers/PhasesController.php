<?php

namespace App\Http\Controllers;

use App\Models\Phase;
use App\Models\Reason;
use App\Models\User;
use Illuminate\Http\Request;

class PhasesController extends Controller
{
    public function index(){

        $levels = Phase::all();
        return view('levels.index', compact('levels'));
    }

    public function artistsLevel($id){
        $reasons = Reason::all();
        $level = Phase::findOrFail($id);
        $artists = User::where('role_id',2)->where('is_approved',1)->where('phase_id',$id)->get();

        return view('levels.artists',compact('artists','reasons','level'));
    }
    public function sportstarsLevel($id){
        $reasons = Reason::all();
        $level = Phase::findOrFail($id);
        $sportstars = User::where('role_id',3)->where('is_approved',1)->where('phase_id',$id)->get();

        return view('levels.sportstars',compact('sportstars','reasons','level'));
    }

    public function activatePhase($id){
        $phase = Phase::findOrFail($id);

        $phase->update([
            'status' => 1,
        ]);

        return back()->with('message','Activity Activated Succesfully');
    }

    public function deactivatePhase($id){
        $phase = Phase::findOrFail($id);

        $phase->update([
            'status' => 0,
        ]);

        return back()->with('message','Activity Dectivated Succesfully');
    }

}
