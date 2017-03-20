<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Silber\Bouncer\Database\HasRolesAndAbilities;

class User extends Authenticatable
{
    use Notifiable;
    use HasRolesAndAbilities;



    public function fullName() {
        return $this->first_name . ' ' . $this->last_name;
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'activated', 'social_id', 'city', 'address', 'type', 'phone', 'rate'
        // 'avatar','social_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
	{
		return $this->hasOne('App\Profile');
	}

    // public function messages()
	// {
	// 	return $this->hasMany('App\Message');
	// }
    //
    // public function applicatns()
	// {
	// 	return $this->hasMany('App\User');
	// }

	 public function lectures()
	 {
	 	return $this->hasMany('App\Lecture');
	 }
    //
    //   // user has many comments
    // public function comments()
    // {
    //     return $this->hasMany('App\Comments','from_user');
    // }




}
