<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Socialite;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/profile/create';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required|digits_between:10,15',
            'term' => 'accepted'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
//        dd($data);
        $data['type'] ? $type = $data['type'] : $type = 1;
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
            'address' => $data['address'],
            'city' => $data['city'],
            'type' => $type,
            'activated' => 0
        ]);

    }

    public function getSocialAuth($provider=null)
    {
      if(!config("services.$provider")) abort('404');
      return Socialite::driver($provider)->redirect();
    }


    public function getSocialAuthCallback($provider=null, Request $request)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect('login/$provider');
        }
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);
        return redirect('/');
    }
    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $githubUser
     * @return User
     */
    private function findOrCreateUser($socialUser)
    {
        if ($authUser = User::where('social_id', $socialUser->id)->first()) {
            return $authUser;
        }
        // dd($socialUser);

        $name = explode(" ", $socialUser->name);
        return User::create([
            'first_name' => $name[0],
            'last_name' => $name[1],
            'email' => $socialUser->getEmail(),
            'social_id' => $socialUser->getId()
        ]);
    }




}
