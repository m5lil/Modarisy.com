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
