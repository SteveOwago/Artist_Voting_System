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

        $artists = User::where('role_id',2)->where('is_approved',1)->get();

        $regions = DB::table('regions')->select('name','id')->get();

        return view('vote',compact('artists','regions'));
    }

    public function vote(Request $request){

        // Add Ip Address to the request before validation

        $request->merge(['ip_address' => $request->ip()]);

        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'id_number' => 'required|integer|min:8|unique:votes',
            'phone' => 'required|integer|min:12|unique:votes',
            'ip_address' => 'required|string|unique:votes',
            'artist_id' => 'required|integer',
            'region_id' => 'required|integer',
        ],
        //Custom validation messages
            [ 'ip_address.unique' => 'Your Vote Has Already been Submitted. Thank You for Participating!',
                'phone.unique' => 'Your Vote Has Already been Submitted. Thank You for Participating!',
                'id_number.unique' => 'Your Vote Has Already been Submitted. Thank You for Participating!',
                'phone.integer' => 'Enter a valid phone number -- Format: 254XXXXXXXXX',
                'artist_id.required' => 'Kindly select your favourite Artist first before submitting',
                'region_id.required' => 'Kindly select your region',
            ]
        );
        



        $vote = Vote::create($request->all());



        return back()->with('message', 'Thank You! Vote Submited Sucessfully');
    }
}
