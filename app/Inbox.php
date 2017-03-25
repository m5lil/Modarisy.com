<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    protected $fillable = [
          'name',
          'email',
          'to_user',
          'user_id',
          'phone',
          'subject',
          'body',
          'read'
    ];
}
