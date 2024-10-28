<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public static function getSettings(){
        return Setting::where([['id','=',1]])->get();
    }
}
