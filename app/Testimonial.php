<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'title',
        'body',
        'photo'
    ];

    public $timestamps = false;

}
