<?php
use Illuminate\Support\Facades\Input;

/*-----------------------------------------------------------------------------
| LARAVEL AUTH
|----------------------------------------------------------------------------*/
Route::group(
    [
        'prefix'     => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect']
    ],
    function () {


        Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
        // Registration Routes...
        Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

        Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');

});

Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');


/*
|----------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------
| SOCIAL LOGINS
|----------------------------------------------------------------------------*/
Route::get('/auth/{provider?}', [
    'uses' => 'Auth\RegisterController@getSocialAuth',
    'as'   => 'auth.getSocialAuth'
]);
Route::get('/auth/{provider?}/callback', [
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

    Route::get('/home_settings', 'SettingController@home_settings');
    Route::post('/home_settings', 'SettingController@home_settings');

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
    Route::get('/users/{id}/delete', 'UserController@destroy');

    // ------------------------------ Abilities ---------------------------- //
    Route::resource('/abilities', 'AbilityController');
    Route::get('/abilities/{id}/delete', 'AbilityController@destroy');

    // -------------------------------- Inbox ------------------------------ //
    Route::resource('/inbox', 'InboxController');
    Route::post('/inbox/delete', 'InboxController@delete');


    // ------------------------------- Profile ----------------------------- //
//    Route::resource('/profiles', 'ProfileController');
    Route::get('/profiles/activate/{id}', 'ProfileController@activate');


    // ------------------------------- Subscribe ----------------------------- //
    Route::resource('/subscribers', 'SubscribersController');
    Route::get('/subscribers/{id}/delete', 'SubscribersController@delete');

    // ------------------------------- Blog ----------------------------- //
    Route::resource('/blog/categories', 'CategoryController');
    Route::get('/blog/categories/{id}/delete', 'CategoryController@destroy');

    Route::resource('/blog/posts', 'PostController');
    Route::get('/blog/posts/{id}/delete', 'PostController@destroy');

    Route::resource('/blog/comments', 'CommentController');
    Route::get('/blog/comments/{id}/delete', 'CommentController@delete');

    // ------------------------------- Enquirys ----------------------------- //
    Route::resource('/enquiries', 'EnquiryController', ['except' => [
        'create', 'store', 'delete'
    ]]);
    Route::get('/enquiries/statue/{type}', 'EnquiryController@statue');
    Route::get('/enquiries/activate/{id}', 'EnquiryController@activate');
    Route::get('/enquiries/{id}/delete', 'EnquiryController@destroy');

    // ------------------------------- Enquirys ----------------------------- //
    Route::resource('/applicants', 'ApplicantController', ['except' => [
        'create', 'store',
    ]]);
    Route::get('/applicants/statue/{type}', 'ApplicantController@statue');
    Route::get('/applicant/activate/{id}', 'ApplicantController@activate');
    Route::get('/applicant/{id}/delete', 'ApplicantController@destroy');

    // ------------------------------- Material ----------------------------- //
    Route::get('/materials', 'DashController@get_materials');
    Route::post('/materials/create', 'DashController@add_material');
    Route::get('/materials/delete/{id}', 'DashController@delete_material');

    // ------------------------------- Testimonial ----------------------------- //
    Route::get('/testimonials', 'DashController@get_testimonials');
    Route::post('/testimonials/create', 'DashController@add_testimonial');
    Route::get('/testimonials/delete/{id}', 'DashController@delete_testimonial');

    // ------------------------------- Testimonial ----------------------------- //
    Route::get('/edulevels', 'DashController@get_edulevels');
    Route::post('/edulevels/create', 'DashController@add_edulevel');
    Route::get('/edulevels/delete/{id}', 'DashController@delete_edulevel');


});
/*
|----------------------------------------------------------------------------*/

Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'OrderController@payWithPaypal',));
Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'OrderController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'payment.status','uses' => 'OrderController@getPaymentStatus',));

/*-----------------------------------------------------------------------------
| WEB VIEW
|----------------------------------------------------------------------------*/
Route::group(
    [
        'prefix'     => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect']
    ],
    function () {
        Route::group(['middleware' => 'web'], function () {

            \Jenssegers\Date\Date::setLocale(LaravelLocalization::getCurrentLocale());
            Route::get('/', function () {
                return view('index');
            });

            Route::get('/be_member', function () {
                return view('frontend.be_member');
            });

            Route::get('/choosetype', function () {
                return view('frontend.choosetype');
            });

            Route::get('/choosetype/{type}', function ($type) {
                $user = \Auth::user();
                $user->type = $type;
                $user->save();
                return redirect()->back();
            });

            Route::get('/search', 'HomeController@filter');

            Route::post('/contact', 'InboxController@contact');

            Route::get('/contact/', 'InboxController@create');

            Route::resource('/profile', 'ProfileController');

            Route::post('/subscribers/submit', 'SubscribersController@Submit');

            Route::group(['middleware' => 'auth'], function () {

                Route::get('/home', 'HomeController@index')->middleware('has_profile');
                // Create New Request
                Route::get('/request/create', 'EnquiryController@create');
                Route::get('/request/{id}/delete', 'EnquiryController@delete');
                Route::get('/request/create_request', 'EnquiryController@getRequest');
                Route::post('/request/create_request', 'EnquiryController@createRequest');
                Route::post('/request', 'EnquiryController@store');
                // Create New Applicant
                Route::get('/applicant/create/{id}', 'ApplicantController@create');
                Route::post('/applicant', 'ApplicantController@store');
                Route::get('/applicant/accept/{enquiry_id}/{applicant_id}', 'ApplicantController@accept');
                Route::post('/applicant/finish/', 'ApplicantController@finish');
                Route::get('/applicants/{enquiry_id}', 'ApplicantController@allApplicants');
                Route::get('/messages/{enquiry_id}/{applicant_id}', 'MessageController@allMessages');
                Route::post('/messages', 'MessageController@store');
            });
            Route::get('/{slug}', 'PageController@show');
            Route::get('/post/{id}', 'PostController@show');
            Route::get('/section/{slug}', 'CategoryController@show');


        });

    });


// --------------------------------- teacher ------------------------------- //
// Route::get('/home', 'HomeController@index');


/*
|----------------------------------------------------------------------------*/


