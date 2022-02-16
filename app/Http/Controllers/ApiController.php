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
}
