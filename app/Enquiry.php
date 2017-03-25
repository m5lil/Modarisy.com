<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'user_id',
        'total_hours',
        'preferred_time',
        'material',
        'subject',
        'target',
        'comment',
        'statue',
        'lat',
        'lng',
        'teacher_id',
        'applicant_id',
    ];

    public function PreferedTime($num)
    {
        if ($num == 1){
            return 'صباحا من 8ص وحتى 12م';
        }elseif ($num == 2){
            return 'منتصف اليوم من 12م وحتى 6م';
        }elseif ($num == 3){
            return 'مساءا من 6م وحتى 10م';
        }elseif ($num == 4){
            return 'فى أى وقت فى اليوم';
        }
    }

//    public function newQuery()
//    {
//        return parent::newQuery()->where('statue', '!=', 0);
//    }
//
    public function Statue($num)
    {
        if ($num == 0){
            return 'معلقة';
        }elseif ($num == 1){
            return 'مفعلة';
        }elseif ($num == 2){
            return 'جارى العمل';
        }elseif ($num == 3){
            return 'منتهية';
        }
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function applicants()
    {
        return $this->hasMany('App\Applicant');
    }


}
