<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ApiResource;
use App\Models\User;
use DB;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getArtists(){
        $artists = User::where('role_id',2);

        return datatables($artists)->make(true);
    }

    public function getVoteCountPerArtist(){
        // Votes for the racing chart in Dashboard
        $votesCountperArtist = DB::table('votes')->select('artist_id',DB::raw("COUNT(*) as count_row"))
                                ->orderBy("count_row","desc")
                                ->groupBy("artist_id")
                                ->join('users','votes.artist_id','users.id')
                                ->where('users.is_approved',1)
                                ->where('users.role_id',2)->take(10)
                                ->get();

        $voteartists = [];
        foreach($votesCountperArtist as $vpc){
            $artist = [
                'name'=> DB::table('users')->where('is_approved',1)->where('id',$vpc->artist_id)->value('name'),
                'artist_id'=> $vpc->artist_id,
                'count' => $vpc->count_row,
            ];
            array_push($voteartists,$artist);
        }
        return new ApiResource($voteartists);
    }

    public function getregisteredArtistPerDay(){
        $artistsweekly = User::select(DB::raw("(COUNT(*)) as count"),DB::raw("DAYNAME(created_at) as dayname"))
                        ->whereBetween('created_at', [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()->endOfWeek()])
                        ->whereYear('created_at', date('Y'))
                        ->groupBy('dayname')
                        ->get();

        $artistsRegistered = [];
        $days = [
            "Sunday",
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday",
        ];

        $data = [];
        foreach($days as $day)
        {
            foreach ($artistsweekly as $aw) {
                if($aw->dayname === $day){
                    $data = [
                        'day'=>$aw->dayname,
                        'count'=>$aw->count,
                    ];
                    array_push($artistsRegistered,$data);
                }
            }
        }

        foreach ($days as $day) {
            if((array_search($day, array_column($artistsRegistered, 'day')))!= $day){
                $data = [
                    'day'=>$day,
                    'count'=>0,
                ];
                    array_push($artistsRegistered,$data);
               }
        }
        usort($artistsRegistered, function($a, $b) {
            return  $b['count']- $a['count'];
          });

       return new ApiResource($artistsRegistered);
    }
    public function getregisteredArtistPerWeek(){
        $weeklyregs = User::all()->groupBy(function($date) {
            return \Carbon\Carbon::parse($date->created_at)->format('W');
        });
        $weeklyregs = $weeklyregs->reverse();

        $weeeklydata = [];
        foreach($weeklyregs as $week){
            $data = [
                'week'=>$week,
                'count'=>0,
            ];
            array_push($weeeklydata,$data);
        }

        dd($weeklyregs);

        return new ApiResource($weeklyregs);
    }
}
