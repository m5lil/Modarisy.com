<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edulevel extends Model
{
    protected $fillable = [
        'title',
        'slug'
    ];

    public $timestamps = false;
}
