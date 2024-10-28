<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public static function countAds() {
        $AdQuery = Ad::where([
            ['removed','=',0]
        ]);
        if($AdQuery->count() > 0){
            return $AdQuery->count();
        }else{
            return 0;
        }
    }

    public function cartadd(Request $request){
        dd($request);
        //Cart::add('293ad', 'Product 1', 1, 9.99, 550);

    }
}
