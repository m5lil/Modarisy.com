<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'title', 'post_id', 'user_id', 'body'
    ];
    // user who has commented
	public function author()
	{
		return $this->belongsTo('App\User','from_user');
	}
	// returns post of any comment
	public function post()
	{
		return $this->belongsTo('App\Posts','on_post');
	}
}
