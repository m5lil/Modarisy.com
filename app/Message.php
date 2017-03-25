<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'user_id',
        'enquiry_id',
        'body',
        'applicant_id',
        'attached',
        'read',
        'to',
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
