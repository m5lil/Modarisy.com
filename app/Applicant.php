<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = [
        'user_id',
        'enquiry_id',
        'brief',
        'hour_price',
        'paid',
        'status',
    ];

    public function Statue($num)
    {
        if ($num == 0) {
            return 'معلقة';
        } elseif ($num == 1) {
            return 'مفعلة';
        } elseif ($num == 2) {
            return 'جارى العمل';
        } elseif ($num == 3) {
            return 'منتهية';
        }
    }
//
//    public function newQuery()
//    {
//        return parent::newQuery()->where('statue', '!=', 0);
//    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function enquiry()
    {
        return $this->belongsTo('App\Enquiry');
    }


}
