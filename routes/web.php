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

Route::get('/', 'MainPageController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/map', 'MapController@index')->name('map');

Route::resource('/reportForm', 'ReportFormController');

Route::group(['prefix' => 'ajax'], function (){
    Route::get('state_division/{id}/townships', 'StateDivisionController@getAjax');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function (){
    Route::get('request_form', 'Admin\RequestFormController@index');
    Route::get('request_form/{id}/approve', 'Admin\RequestFormController@approve');
    Route::get('request_form/{id}/cancel', 'Admin\RequestFormController@cancel');
    Route::get('request_form/{id}/close', 'Admin\RequestFormController@close');
    Route::get('request_form/{id}/restore', 'Admin\RequestFormController@restore');
    Route::get('request_form/{id}/re_open', 'Admin\RequestFormController@re_open');

    Route::get('request_volunteer', 'Admin\RequestVolunteerController@index');
    Route::get('volunteer_form', 'Admin\VolunteerFormController@index');
});