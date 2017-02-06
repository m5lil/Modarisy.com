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
    return view('welcome');
});

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', 'DashController@index');
    Route::resource('/pages', 'PageController');
    Route::post('/pages/ajax', 'PageController@ajax');
    Route::post('/pages/delete', 'PageController@delete');
    ///////////////////////////  Setings  ////////////////////////////
    Route::get('/settings', 'SettingController@index');
    Route::post('/settings', 'SettingController@update');
    ///////////////////////////  Menu  ////////////////////////////////
    Route::resource('/menu','MenuController');
    // Route::post('/menu/{id}/update',['as' => 'menu.update', 'uses' => 'MenuController@update']);
    Route::get('/menu/{id}/delete','MenuController@destroy');
    ///////////////////////////  Users  ////////////////////////////////
    Route::resource('/users', 'UserController');

    ///////////////////////////  Inbox  ////////////////////////////////
    Route::resource('/inbox', 'InboxController');

});

Auth::routes();

Route::get('/login/{provider?}',[
    'uses' => 'Auth\RegisterController@getSocialAuth',
    'as'   => 'auth.getSocialAuth'
]);
Route::get('/login/callback/{provider?}',[
    'uses' => 'Auth\RegisterController@getSocialAuthCallback',
    'as'   => 'auth.getSocialAuthCallback'
]);

Route::get('/home', 'HomeController@index');
