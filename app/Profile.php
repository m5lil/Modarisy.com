<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BrianFaust\Reviewable\HasReviews;

class Profile extends Model
{

    use HasReviews;
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
        'lat',
        'lng',
    ];


	public function user()
	{
		return $this->belongsTo('App\User');
	}

//    public function newQuery()
//    {
//        return parent::newQuery()->where('statue', '!=', 0);
//    }



}
