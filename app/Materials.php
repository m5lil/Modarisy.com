<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{
    protected $fillable = [
        'title',
        'slug'
    ];

    public $timestamps = false;

}
