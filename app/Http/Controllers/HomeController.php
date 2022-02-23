<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Reason;
use App\Models\Vote;
use DB;
use App\Models\Disapprove;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //Data for homepage dashboard statistics
        $authuser = User::where('id', \Auth::id())->get();
        $artists = User::where('role_id',2)->get();
        $approvedArtists = User::where('role_id','!=',1)->where('is_approved',1)->get();
        $votes = Vote::all();
        $reasons = Reason::all();


        return view('home',compact('artists','authuser', 'approvedArtists','votes','reasons'));
    }
    public function artists(){
        $artists = User::where('role_id',2)->get();
        $reasons = Reason::all();
        return view('artists',compact('artists','reasons'));
    }
    public function sportstars(){
        $sportstars = User::where('role_id',3)->get();
        $reasons = Reason::all();
        return view('sportstars',compact('sportstars','reasons'));
    }
    public function judges(){
        $judges = User::where('role_id',1)->get();
        return view('judges',compact('judges'));
    }

    public function create_judge(){

        return view('create_judge');
    }

    public function add_judge(Request $request){

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|integer|min:12|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_id' => 1,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('message', 'Judge Added Sucessfully');
    }

    public function profile($id){

        $user = User::findOrFail($id);
        $reasons = Reason::all();

        return view('profile', compact('user','reasons'));

    }

    public function edit_profile($id){

        $user = User::findOrFail($id);

        return view('edit_profile', compact('user'));
    }

    public function update_profile(Request $request, $id){


        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|integer|min:12',
        ]);

        $user = User::findOrFail($id);




        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('profile',[$user->id])->with('message','Profile Updated Successfully');

    }

    // Approve Artist/Gamer
    public function approve($id){

        $user = User::findOrFail($id);

        $is_approved = 1;

        $user->update([
            'is_approved' => $is_approved,
        ]);

        return back()->with('message','Artist Approved Successfully');

    }

    // DisApprove Artist/Gamer
    public function disapprove(Request $request,$id){

        $user = User::findOrFail($id);

        $is_approved = 0;

        $user->update([
            'is_approved' => $is_approved,
        ]);

        Disapprove::create([
            'reason_id' => $request->reason_id,
            'reason'=>$request->reason,
            'artist_id'=> $id,
        ]);

        return back()->with('message','Operation Successful');

    }
    public function delete_artist($id){

        $user = User::findOrFail($id);
        //Check if artists has votes
        if($user->votes()->count()>0){
            return back()->with('errors','Artist with cannot be deleted. Artist has Votes');
        }

        $user->delete();


        return back()->with('message','Operation Successful');

    }

}
