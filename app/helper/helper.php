<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function setting($settingname = null)
{
    @$value = \App\Setting::where('set_name', $settingname)->first()->value;
    return $value ? $value : 'Not Found';
}


function PreferedTime($num)
{
    if ($num == 1) {
        return 'صباحا من 8ص وحتى 12م';
    } elseif ($num == 2) {
        return 'منتصف اليوم من 12م وحتى 6م';
    } elseif ($num == 3) {
        return 'مساءا من 6م وحتى 10م';
    } elseif ($num == 4) {
        return 'فى أى وقت فى اليوم';
    }
}