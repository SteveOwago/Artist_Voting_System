<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
//use App\Models\Region;

class IndexController extends Controller
{
    public function index(){

        $artists = User::where('role_id',2)->where('is_approved',1)->get();

        $regions = DB::table('regions')->select('name','id')->get();

        return view('vote',compact('artists','regions'));
    }
}
