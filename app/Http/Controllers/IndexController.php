<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class IndexController extends Controller
{
    public function index(){

        $artists = User::where('role_id',2)->where('is_approved',1)->pluck('name','id');

        return view('vote',compact($artists));
    }
}
