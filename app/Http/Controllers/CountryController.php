<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CountryController extends Controller{

    public function selectcity(Request $request){
        if($request->id != null): $request->id = e($request->id); else: $request->id = 0;   endif;
        session('selector.city.id',e($request->id));
        Session::put('selector.city.id',e($request->id));
        return redirect()->back();
    }
}
