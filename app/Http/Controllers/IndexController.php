<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Vote;
use DB;
//use App\Models\Region;

class IndexController extends Controller
{
    public function index(){

        $artists = User::where('role_id',2)->where('is_approved',1)->where('phase_id',4)->take(10)->get();
        $sportstars = User::where('role_id',3)->where('is_approved',1)->where('phase_id',4)->take(10)->get();
        // $regions = DB::table('regions')->select('name','id')->get();

        return view('vote',compact('artists'));
    }

    public function vote($id){
       $user = User::findOrFail($id);
       $regions = DB::table('regions')->select('name','id')->get();
        return view('voteartist',compact('user','regions'));
    }

    public function voteArtist(Request $request){
        // Add Ip Address to the request before validation
        $request->merge(['ip_address' => $request->ip()]);

        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:votes',
            'ip_address' => 'required|string|unique:votes',
            'artist_id' => 'required|integer',
            'region_id' => 'required|integer',
        ],
        //Custom validation messages
            [ 'ip_address.unique' => 'Your Vote Has Already been Submitted. Thank You for Participating!',
                'email.unique' => 'Your Vote Has Already been Submitted. Thank You for Participating!',
                'id_number.unique' => 'Your Vote Has Already been Submitted. Thank You for Participating!',
                'artist_id.required' => 'Kindly select your favourite Artist first before submitting',
                'region_id.required' => 'Kindly select your region',
            ]
        );




        $vote = Vote::create($request->all());



        return back()->with('message', 'Thank You! Vote Submited Sucessfully');
    }
}
