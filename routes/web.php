<?php

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
    return view('welcome')->with([
        'divisions' => \App\StateDivision::all()
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/map', 'MapController@index')->name('map');

Route::resource('/reportForm', 'ReportFormController');

Route::group(['prefix' => 'ajax'], function (){
    Route::get('state_division/{id}/townships', 'StateDivisionController@getAjax');
});