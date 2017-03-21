<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'user_id',
        'lecture_id',
        'body',
        'applicant_id',
        'attached',
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
