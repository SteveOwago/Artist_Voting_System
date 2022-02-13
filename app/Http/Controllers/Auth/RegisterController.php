<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'integer', 'min:12'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'profile' => ['required','file','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'video' => ['required','max:20000'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);

        if(request()->hasFile('profile')&& request()->hasFile('video')){

            //Upload Profile Picture
            $profile = time().'.'.request()->file('profile')->getClientOriginalName();  
            request()->file('profile')->move(public_path('profile_pictures'), $profile);

            //Upload video
            $video = time().'.'.request()->file('video')->getClientOriginalName();  
            request()->file('video')->move(public_path('video_uploads'), $video);


            $user->update(['profile'=>$profile, 'video'=>$video]);

        }
        return $user;

    }
}
