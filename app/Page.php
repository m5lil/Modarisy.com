<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sluggable;
class Page extends Model
{
    protected $fillable = [
        'title', 'body', 'slug', 'statue', 'seo_title', 'seo_keywords', 'seo_description',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
