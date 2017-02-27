<?php


/*-----------------------------------------------------------------------------
| SOCIAL LOGINS
|----------------------------------------------------------------------------*/
Route::get('/login/{provider?}',[
    'uses' => 'Auth\RegisterController@getSocialAuth',
    'as'   => 'auth.getSocialAuth'
]);
Route::get('/login/callback/{provider?}',[
    'uses' => 'Auth\RegisterController@getSocialAuthCallback',
    'as'   => 'auth.getSocialAuthCallback'
]);
/*
|----------------------------------------------------------------------------*/




/*-----------------------------------------------------------------------------
| DASHBOARD
|----------------------------------------------------------------------------*/
Route::group(['prefix' => 'dashboard','middleware' => 'admin'], function () {

    Route::get('/', 'DashController@index');

    // -------------------------------- Pages ------------------------------ //
    Route::resource('/pages', 'PageController');
    Route::post('/pages/ajax', 'PageController@ajax');
    Route::post('/pages/delete', 'PageController@delete');

    // ------------------------------- Setings ----------------------------- //
    Route::get('/settings', 'SettingController@index');
    Route::post('/settings', 'SettingController@update');

    // --------------------------------- Menu ------------------------------ //
    Route::resource('/menu','MenuController');
    Route::get('/menu/{id}/delete','MenuController@destroy');

    // -------------------------------- User ------------------------------- //
    Route::resource('/users', 'UserController');
    Route::get('/users/members/{type}', 'UserController@members');

    // ------------------------------ Abilities ---------------------------- //
    Route::resource('/abilities', 'AbilityController');

    // -------------------------------- Inbox ------------------------------ //
    Route::resource('/inbox', 'InboxController');

    // ------------------------------- Profile ----------------------------- //
    Route::resource('/profiles', 'ProfileController');

    // ------------------------------- Profile ----------------------------- //


    // ------------------------------- Profile ----------------------------- //


    // ------------------------------- Profile ----------------------------- //


    // ------------------------------- Profile ----------------------------- //

});
/*
|----------------------------------------------------------------------------*/





/*-----------------------------------------------------------------------------
| WEB VIEW
|----------------------------------------------------------------------------*/
Route::get('/home', 'HomeController@index');
Route::get('/', function () {
    return view('index');
});
// --------------------------------- teacher ------------------------------- //
// Route::get('/home', 'HomeController@index');



/*-----------------------------------------------------------------------------
| LARAVEL AUTH
|----------------------------------------------------------------------------*/
Auth::routes();
/*
|----------------------------------------------------------------------------*/


/*
|----------------------------------------------------------------------------*/
