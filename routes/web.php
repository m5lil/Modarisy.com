<?php
use Illuminate\Support\Facades\Input;

/*-----------------------------------------------------------------------------
| LARAVEL AUTH
|----------------------------------------------------------------------------*/
Auth::routes();
/*
|----------------------------------------------------------------------------*/


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
    Route::get('/pages/{id}/delete','PageController@destroy');

//    Route::post('/pages/ajax', 'PageController@ajax');
//    Route::post('/pages/delete', 'PageController@delete');

    // ------------------------------- Setings ----------------------------- //
    Route::get('/settings', 'SettingController@index');
    Route::post('/settings', 'SettingController@update');

    // --------------------------------- Menu ------------------------------ //
    Route::resource('/menu','MenuController');
    Route::get('/menu/{id}/delete','MenuController@destroy');
    Route::post('/menu/order', function()
    {
//        dd(Input::get('item'));
        if(Input::has('item'))
        {
            $i = 0;
            foreach(Input::get('item') as $id)
            {
                $i++;
                $item = App\Menu::find($id);
                $item->order = $i;
                $item->save();
            }
            return Response::json(array('success' => true));
        }
        else
        {
            return Response::json(array('success' => false));
        }
    });

    // -------------------------------- User ------------------------------- //
    Route::resource('/users', 'UserController');
    Route::get('/users/members/{type}', 'UserController@members');

    // ------------------------------ Abilities ---------------------------- //
    Route::resource('/abilities', 'AbilityController');

    // -------------------------------- Inbox ------------------------------ //
    Route::resource('/inbox', 'InboxController');

    // ------------------------------- Profile ----------------------------- //
    Route::resource('/profiles', 'ProfileController');

    // ------------------------------- Subscribe ----------------------------- //
    Route::resource('/subscribers', 'SubscribersController');
    Route::post('/subscribers/submit', 'SubscribersController@Submit');

    // ------------------------------- Blog ----------------------------- //
    Route::resource('/blog/categories', 'CategoryController');
    Route::get('/blog/categories/{id}/delete','CategoryController@destroy');

    Route::resource('/blog/posts', 'PostController');
    Route::get('/blog/posts/{id}/delete','PostController@destroy');

    Route::resource('/blog/comments', 'CommentController');
    Route::get('/blog/comments/{id}/delete','CommentController@destroy');


    // ------------------------------- Lectures ----------------------------- //
    Route::resource('/lectures', 'LectureController');
    Route::get('/lectures/statue/{type}', 'LectureController@statue');


    // ------------------------------- Profile ----------------------------- //

});
/*
|----------------------------------------------------------------------------*/





/*-----------------------------------------------------------------------------
| WEB VIEW
|----------------------------------------------------------------------------*/
Route::get('/home', 'HomeController@index')->middleware('mode');
Route::get('/', function () {
    return view('index');
});
// --------------------------------- teacher ------------------------------- //
// Route::get('/home', 'HomeController@index');


/*
|----------------------------------------------------------------------------*/


