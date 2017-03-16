<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $fillable = [
        'user_id',
        'total_hours',
        'preferred_time',
        'subject',
        'target',
        'comment',
        'statue',
        'num_bid',
        'applicant_id',
    ];
}
