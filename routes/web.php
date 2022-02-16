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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('artists', 'HomeController@artists')->name('artists');
Route::get('judges', 'HomeController@judges')->name('judges');
Route::get('judges/create', 'HomeController@create_judge')->name('create_judge');
Route::post('judges/create', 'HomeController@add_judge')->name('add_judge');

Route::get('profile/{id}', 'HomeController@profile')->name('profile');
Route::get('edit_profile/{id}', 'HomeController@edit_profile')->name('edit_profile');
Route::put('edit_profile/{id}', 'HomeController@update_profile')->name('update_profile');

Route::post('approve/{id}','HomeController@approve')->name('approve');
Route::post('disapprove/{id}','HomeController@disapprove')->name('disapprove');
Route::delete('delete/{id}','HomeController@delete_artist')->name('delete');

Route::get('vote', 'IndexController@index')->name('vote');
Route::post('submit_vote', 'IndexController@vote')->name('submit_vote');