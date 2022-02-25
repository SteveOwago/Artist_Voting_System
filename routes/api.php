<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/artists','ApiController@getArtists')->name('api.artists.index');
Route::get('/v1/getVoteCountPerArtist','ApiController@getVoteCountPerArtist')->name('api.votes.getVoteCountPerArtist');
Route::get('/v1/getVoteCountPerSportStar','ApiController@getVoteCountPerSportStar')->name('api.votes.getVoteCountPerSportStar');
Route::get('/v1/getregisteredArtistPerDay','ApiController@getregisteredArtistPerDay')->name('api.artists.getregisteredArtistPerDay');
Route::get('/v1/getregisteredArtistPerWeek','ApiController@getregisteredArtistPerWeek')->name('api.artists.getregisteredArtistPerWeek');
Route::get('/v1/artistsperRegion','ApiController@artistsperRegion')->name('api.artists.artistsperRegion');
