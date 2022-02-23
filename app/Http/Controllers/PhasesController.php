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
}
