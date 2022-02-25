<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('otp');

Route::get('otp', [App\Http\Controllers\OTPController::class, 'index'])->name('otp.index');
Route::post('otp', [App\Http\Controllers\OTPController::class, 'store'])->name('otp.post');
Route::get('otp/reset', [App\Http\Controllers\OTPController::class, 'resend'])->name('otp.resend');

Route::get('approval-disaproval-logs', 'HomeController@approvalDissaprovalLogs')->name('approval.disaproval.logs')->middleware('otp');
Route::get('artists', 'HomeController@artists')->name('artists')->middleware('otp');
Route::get('sportstars', 'HomeController@sportstars')->name('sportstars')->middleware('otp');
Route::get('judges', 'HomeController@judges')->name('judges')->middleware('otp');
Route::get('judges/create', 'HomeController@create_judge')->name('create_judge')->middleware('otp');
Route::post('judges/create', 'HomeController@add_judge')->name('add_judge')->middleware('otp');

Route::get('profile/{id}', 'HomeController@profile')->name('profile')->middleware('otp');
Route::get('edit_profile/{id}', 'HomeController@edit_profile')->name('edit_profile')->middleware('otp');
Route::put('edit_profile/{id}', 'HomeController@update_profile')->name('update_profile');

Route::post('approve/{id}','HomeController@approve')->name('approve')->middleware('otp');
Route::post('disapprove/{id}','HomeController@disapprove')->name('disapprove')->middleware('otp');
Route::delete('delete/{id}','HomeController@delete_artist')->name('delete')->middleware('otp');

Route::get('vote', 'IndexController@index')->name('vote')->middleware('otp');
Route::get('vote/{id}', 'IndexController@vote')->name('voteArtist')->middleware('otp');
Route::post('submit_vote', 'IndexController@voteArtist')->name('submit_vote')->middleware('otp');


Route::get('levels','PhasesController@index')->name('levels')->middleware('otp');
Route::get('levels/artists/{id}','PhasesController@artistsLevel')->name('levels.artists')->middleware('otp');
Route::get('levels/sportstars/{id}','PhasesController@sportstarsLevel')->name('levels.sportstars')->middleware('otp');
