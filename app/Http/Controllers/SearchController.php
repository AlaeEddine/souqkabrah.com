<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\City;
use App\Models\Country;
use  Illuminate\Support\Facades\App;

class SearchController extends Controller
{
    public static function adsbybrand(Request $request){
       return SearchController::adsbysubsubcategory($request);
    }
    public static function adsbymodel(Request $request){
        return SearchController::adsbysubsubcategory($request);
    }
    
    public static function adsbyyear(Request $request){
        return SearchController::adsbysubsubcategory($request);
    }
    public static function adsbymodelandcity(Request $request){
        return SearchController::adsbysubsubcategory($request);
    }
    public static function adsbycity(Request $request){
        return SearchController::adsbysubsubcategory($request);
    }
    public static function adsbycategory(Request $request){
        return SearchController::adsbysubsubcategory($request);
    }    
    public static function adsbysubcategory(Request $request){
        return SearchController::adsbysubsubcategory($request);
    }
    
    public static function adsbymodelandyear(Request $request){
        return SearchController::adsbysubsubcategory($request);
    }
    
    
    public static function adsbysubsubcategory(Request $request){
        if($request->Country != null): $request->Country = e($request->Country); else: $request->Country = 0; endif;
        if($request->City != null): $request->City = e($request->City); else: $request->City = 0; endif;
        if($request->Category != null): $request->Category = e($request->Category); else: $request->Category = 0; endif;
        if($request->SubCategory != null): $request->SubCategory = e($request->SubCategory); else: $request->SubCategory = 0; endif;
        if($request->SubSubCategory != null): $request->SubSubCategory = e($request->SubSubCategory); else: $request->SubSubCategory = 0; endif;
        if(App::currentLocale() == 'ar'){
            $ADS_RESULT_TITLE = 'نتائج البحث : '.e($request->SubSubCategoryName).' في '.e($request->CityName);
        }else{
            $ADS_RESULT_TITLE = 'Search Results : '.e($request->SubSubCategoryName).' In '.e($request->CityName);
        }
        $AdQuery = Ad::where([
            ['id_country','=',$request->Country],
            ['id_city','=',$request->City],
            ['id_category','=',$request->Category],
            ['id_subcategory','=',$request->SubCategory],
            ['id_subsubcategory','=',$request->SubSubCategory],
            ['banned', '!=', 0],
            ['id' ,'=', 0],
            ['removed','=',0],
        ]);
        $DATA_TO_APPEND = [
            'Ads' => $AdQuery->get(),
            'ADS_RESULT_TITLE' => $ADS_RESULT_TITLE
        ];
        if($AdQuery->count() > 0){
            return view('pages.search.index',$DATA_TO_APPEND);
        }else{
            return view('pages.search.notfound',$DATA_TO_APPEND);
        }
    }

    
    
}
