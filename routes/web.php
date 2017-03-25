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
Route::get('/login/{provider?}', [
    'uses' => 'Auth\RegisterController@getSocialAuth',
    'as'   => 'auth.getSocialAuth'
]);
Route::get('/login/callback/{provider?}', [
    'uses' => 'Auth\RegisterController@getSocialAuthCallback',
    'as'   => 'auth.getSocialAuthCallback'
]);
/*
|----------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------
| DASHBOARD
|----------------------------------------------------------------------------*/
Route::group(['prefix' => 'dashboard', 'middleware' => 'admin'], function () {

    Route::get('/', 'DashController@index');

    // -------------------------------- Pages ------------------------------ //
    Route::resource('/pages', 'PageController');
    Route::get('/pages/{id}/delete', 'PageController@destroy');

//    Route::post('/pages/ajax', 'PageController@ajax');
//    Route::post('/pages/delete', 'PageController@delete');

    // ------------------------------- Setings ----------------------------- //
    Route::get('/settings', 'SettingController@index');
    Route::post('/settings', 'SettingController@update');

    // --------------------------------- Menu ------------------------------ //
    Route::resource('/menu', 'MenuController');
    Route::get('/menu/{id}/delete', 'MenuController@destroy');
    Route::post('/menu/order', function () {
        if (Input::has('item')) {
            $i = 0;
            foreach (Input::get('item') as $id) {
                $i++;
                $item = App\Menu::find($id);
                $item->order = $i;
                $item->save();
            }
            return Response::json(array('success' => true));
        } else {
            return Response::json(array('success' => false));
        }
    });

    // -------------------------------- User ------------------------------- //
    Route::resource('/users', 'UserController');
    Route::get('/users/members/{type}', 'UserController@members');

    // ------------------------------ Abilities ---------------------------- //
    Route::resource('/abilities', 'AbilityController');
    Route::get('/abilities/{id}/delete', 'AbilityController@destroy');

    // -------------------------------- Inbox ------------------------------ //
    Route::resource('/inbox', 'InboxController');

    // ------------------------------- Profile ----------------------------- //
//    Route::resource('/profiles', 'ProfileController');

    // ------------------------------- Subscribe ----------------------------- //
    Route::resource('/subscribers', 'SubscribersController');

    // ------------------------------- Blog ----------------------------- //
    Route::resource('/blog/categories', 'CategoryController');
    Route::get('/blog/categories/{id}/delete', 'CategoryController@destroy');

    Route::resource('/blog/posts', 'PostController');
    Route::get('/blog/posts/{id}/delete', 'PostController@destroy');

    Route::resource('/blog/comments', 'CommentController');
    Route::get('/blog/comments/{id}/delete', 'CommentController@destroy');

    // ------------------------------- Enquirys ----------------------------- //
    Route::resource('/enquiries', 'EnquiryController');
    Route::get('/enquiries/statue/{type}', 'EnquiryController@statue');
    Route::get('/enquiries/activate/{id}', 'EnquiryController@activate');
    Route::get('/enquiries/{id}/delete', 'EnquiryController@destroy');

    // ------------------------------- Enquirys ----------------------------- //
    Route::resource('/applicants', 'ApplicantController');
    Route::get('/applicants/statue/{type}', 'ApplicantController@statue');
    Route::get('/applicant/activate/{id}', 'ApplicantController@activate');
    Route::get('/applicant/{id}/delete', 'ApplicantController@destroy');

    // ------------------------------- Other ----------------------------- //
    Route::get('/materials', 'DashController@get_materials');
    Route::post('/materials/create', 'DashController@add_material');


});
/*
|----------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------
| WEB VIEW
|----------------------------------------------------------------------------*/
Route::group(['middleware' => 'web'], function () {

    Route::get('/', function () {
        return view('index');
    });



    Route::get('/be_member', function () {
        return view('frontend.be_member');
    });

    Route::post('/search', 'HomeController@filter');

    Route::post('/contact', 'InboxController@contact');
    Route::get('/contact/', 'InboxController@create');

    Route::resource('/profile', 'ProfileController');

    Route::post('/subscribers/submit', 'SubscribersController@Submit');

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/home', 'HomeController@index')->middleware('has_profile');
        // Create New Request
        Route::get('/request/create', 'EnquiryController@create');
        Route::get('/request/{id}/delete', 'EnquiryController@delete');
        Route::post('/request/create_request', 'EnquiryController@createRequest');
        Route::post('/request', 'EnquiryController@store');
        // Create New Applicant
        Route::get('/applicant/create/{id}', 'ApplicantController@create');
        Route::post('/applicant', 'ApplicantController@store');
        Route::get('/applicant/accept/{enquiry_id}/{applicant_id}', 'ApplicantController@accept');
        Route::get('/applicant/finish/{enquiry_id}/{applicant_id}', 'ApplicantController@finish');
        Route::get('/applicants/{enquiry_id}', 'ApplicantController@allApplicants');
        Route::get('/messages/{enquiry_id}/{applicant_id}', 'MessageController@allMessages');
        Route::post('/messages', 'MessageController@store');

    });

    Route::get('/{slug}', 'PageController@show');

});

// --------------------------------- teacher ------------------------------- //
// Route::get('/home', 'HomeController@index');



/*
|----------------------------------------------------------------------------*/


