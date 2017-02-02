<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    protected $fillable = [
          'name',
          'email',
          'from_user',
          'user_id',
          'phone',
          'subject',
          'body',
          'read'
    ];
}
