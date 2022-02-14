<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Vote;

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
        $video_size = 0;

        foreach( File::allFiles(public_path('video_uploads')) as $file)
        {
            $video_size += $file->getSize();
        }
        $video_size = number_format($video_size / 1048576,2);



        $authuser = User::where('id', \Auth::id())->get();
        $artists = User::where('role_id',2)->get();
        $approvedArtists = User::where('role_id','!=',2)->where('is_approved',1)->get();
        $votes = Vote::all();

        return view('home',compact('artists','authuser', 'video_size', 'approvedArtists','votes'));
    }
    public function artists(){
        $artists = User::where('role_id',2)->get();

        return view('artists',compact('artists'));
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
            'phone' => 'required|integer|min:12',
            'profile' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_id' => 1,
            'password' => Hash::make($request->password),
        ]);

        if($request->hasFile('profile')&& $request->hasFile('video')){

            //Upload Profile Picture
            $profile = time().'.'.$request->file('profile')->getClientOriginalName();  
            $request->file('profile')->move(public_path('profile_pictures'), $profile);



            $user->update(['profile'=>$profile]);
        }
        return view('judges');
    }

    public function profile($id){

        $user = User::findOrFail($id);

        return view('profile', compact('user'));

    }

    public function edit_profile($id){
        
        $user = User::findOrFail($id);

        return view('edit_profile', compact('user'));
    }

    public function update_profile(Request $request, $id){
        

        if($request->hasFile('video')|| $request->hasFile('profile')){
            $validated = $request->validate([
                'video' => 'file|max:20000',
                'profile' => 'file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|integer|min:12',
        ]);
        
        $user = User::findOrFail($id);
        
        if($request->hasFile('profile') || $request->hasFile('video')){
            if($request->hasFile('profile')){
                $profile = public_path('profile_pictures/').$user->profile;
                if($profile && $user->profile !== "default.png"){
                    File::delete($profile);
                }

                $profile = time().'.'.$request->file('profile')->getClientOriginalName();  
                $request->file('profile')->move(public_path('profile_pictures'), $profile);

                $user->update(['profile'=>$profile,]);
            }
            
            if($request->hasFile('video')){
                $video = public_path('video_uploads/').$user->video;
                    if($video){
                        File::delete($video);
                    }
                

                $video = time().'.'.$request->file('video')->getClientOriginalName();  
                $request->file('video')->move(public_path('video_uploads'), $video);

                $user->update(['video'=>$video,]);
            }


        }
          

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('profile',[$user->id]);

    }

    // Approve Artist/Gamer
    public function approve($id){

        $user = User::findOrFail($id);

        $is_approved = 1;

        $user->update([
            'is_approved' => $is_approved,
        ]);

        return back();

    }

    // DisApprove Artist/Gamer
    public function disapprove($id){

        $user = User::findOrFail($id);

        $is_approved = 0;

        $user->update([
            'is_approved' => $is_approved,
        ]);

        return back();

    }

}