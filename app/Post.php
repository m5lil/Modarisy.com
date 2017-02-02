<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'title', 'slug', 'body', 'statue', 'category_id', 'seo_title', 'seo_keywords', 'seo_description', 'photo',
    ];

    // public function comments()
	// {
	//     return $this->hasMany('App\Comments','on_post');
	// }
    //
    // public function user()
	// {
	// 	return $this->belongsTo('App\User','user_id');
	// }
    // public function cat()
	// {
	// 	return $this->belongsTo('App\Cat','cat_id');
	// }



}
