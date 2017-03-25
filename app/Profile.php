<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public $timestamps = false;
	protected $fillable = [
        'gen_exp',
        'sch_exp',
        'teach_time',
        'teach_hours',
        'hour_rate',
        'intro',
        'gender',
        'school',
        'user_id',
        'dbirth',
        'age',
        'hear',
        'statue',
        'specialty',
        'lang',
        'level',
        'photo',
    ];


	public function user()
	{
		return $this->belongsTo('App\User');
	}


}
