<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Area;
use App\Models\City;
use App\Models\Country;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Support\Facades\App;
use App\Models\Ad;
use Session;
use App\Models\IpCountry;
use App\Models\Search;
use App\Models\User;
use App\Models\Order;
use App\Models\Village;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class GeneralController extends Controller
{

    public function redirectToPremiumPage(){
        return redirect(route('premium'));
    }

    public function team(){
       $UserQuery =  User::where([
        ['level', '>',1],
        ['id', '!=',2],
        ['removed', '=',0],
       ]);
       if($UserQuery->count() > 0){
            return view('pages.team.index',[
                'Teams' => $UserQuery->get(),
            ]);
       }else{
        abort(404);
       }
    }

    public function premiumcalculateprice(Request $request){
        if($request->plan == null){ $request->plan = 0; }else { $request->plan = e($request->plan); }
        if($request->removeoradd == null){ $request->removeoradd = 0; }else { $request->removeoradd = e($request->removeoradd); }
        $CountOrders = 0;
        if($request->checked1 == null || strstr($request->checked1,"unchecked")){
            $request->checked1 = 0;
            Session::put('premium.id.1',0);
        }else {
            $request->checked1 = 1.65; $CountOrders++;
            Session::put('premium.id.1',$request->checked1);

        }
        if($request->checked2 == null || strstr($request->checked2,"unchecked")){
            $request->checked2 = 0;
            Session::put('premium.id.2',0);
        }else {
            $request->checked2 = 3.29; $CountOrders++;
            Session::put('premium.id.2',$request->checked2);

        }
        if($request->checked3 == null || strstr($request->checked3,"unchecked")){
            $request->checked3 = 0;
            Session::put('premium.id.3',0);
        }else {
            $request->checked3 = 8.10; $CountOrders++;
            Session::put('premium.id.3',$request->checked3);
        }
        if($request->checked4 == null || strstr($request->checked4,"unchecked")){
            $request->checked4 = 0;
            Session::put('premium.id.4',0);
        }else {
            $request->checked4 = 0.81; $CountOrders++;
            Session::put('premium.id.4',$request->checked4);
        }
        if($request->checked5 == null || strstr($request->checked5,"unchecked")){
            $request->checked5 = 0;
            Session::put('premium.id.5',0);
        }else {
            $request->checked5 = 1.61; $CountOrders++;
            Session::put('premium.id.5',$request->checked5);

        }
        if($request->checked6 == null || strstr($request->checked6,"unchecked")){
            $request->checked6 = 0;
            Session::put('premium.id.6',0);
        }else {
            $request->checked6 = 4.20; $CountOrders++;
            Session::put('premium.id.6',$request->checked6);
        }

        $TOTAL_PRICE_TO_ADD_TO_CART = $request->checked1 + $request->checked2 + $request->checked3 + $request->checked4 + $request->checked5 + $request->checked6;
        Session::put('premium.price',$TOTAL_PRICE_TO_ADD_TO_CART);

        return [
            'totalprice' => number_format(Session::get('premium.price'),2),
            'totalpricenumber' => Session::get('premium.price'),
            'count' => $CountOrders,
            'orderID' => Session::get('premium.id'),
        ];
    }
    public function premium() {
        return view('pages.premium.index');
    }

    public function premiumnext(Request $request){
        if(Session::get('premium.price') != null && Session::get('premium.price') != 0){
            return view('pages.premium.next');
        }else{
            return redirect(route('premium'));
        }
    }
    public function premiumsubmit(Request $request){
        if(Session::get('premium.price') != null && Session::get('premium.price') != 0){
            if($request->pack == null){ $request->pack = 0; }else { $request->pack = e($request->pack); }
            if($request->pack == 0 || $request->pack <7 || $request->pack >11){
                return redirect(route('premium.next'));
            }else{
                $ARRAY_TO_INSERT_INTO_ORDER = [
                    'id_owner' => e(session('user.id')),
                    'name_owner' => e(session('user.name')),
                    'totalprice' => e(session('premium.price')),
                    'status' => 0,
                    'removed' => 0,
                ];
                $FINAL_PRICE = 0;
                for($Z = 1; $Z <=11; $Z++):
                    if($Z == 7):
                        if($request->pack == 7):
                            Session::put('premium.id.7',2.45);
                        else:
                            Session::put('premium.id.7',0);
                        endif;
                    endif;
                    if($Z == 8):
                        if($request->pack == 8):
                            Session::put('premium.id.8',1.63);
                        else:
                            Session::put('premium.id.8',0);
                        endif;
                    endif;
                    if($Z == 9):
                        if($request->pack == 9):
                            Session::put('premium.id.9',1.22);
                        else:
                            Session::put('premium.id.9',0);
                        endif;
                    endif;
                    if($Z == 10):
                        if($request->pack == 10):
                            Session::put('premium.id.10',3.68);
                        else:
                            Session::put('premium.id.10',0);
                        endif;
                    endif;
                    if($Z == 11):
                        if($request->pack == 11):
                            Session::put('premium.id.11',5.32);
                        else:
                            Session::put('premium.id.11',0);
                        endif;
                    endif;
                    $FINAL_PRICE +=Session::get('premium.id.'.$Z);
                endfor;
                Session::put('premium.price',$FINAL_PRICE);
                for($j = 1; $j <=11; $j++):
                    $ARRAY_TO_INSERT_INTO_ORDER = array_merge(["pack$j" => e(session("premium.id.$j"))],$ARRAY_TO_INSERT_INTO_ORDER);
                endfor;
                if(Session::get('premium.order') == 0 || Session::get('premium.order') == null):
                   $OrderID = Order::create($ARRAY_TO_INSERT_INTO_ORDER);
                   Session::put('premium.order',$OrderID->id);
                endif;

                return view('pages.premium.recap',[
                    'Pack' => $request->pack,
                    'OrderID' => Session::get('premium.order'),
                ]);
            }
        }else{
            return redirect(route('premium'));
        }
    }

    public function premiumpaymentselect(Request $request){
        if(Session::get('premium.order') == 0 || Session::get('premium.order') == null || Session::get('premium.price') == null || Session::get('premium.price') == 0){
            return redirect(route('premium'));
        }else{
            return view('pages.premium.payment',[
                'OrderID' => Session::get('premium.order'),
            ]);
        }
    }


    public function villagesfromcities(Request $request){
        if($request->city == null){ $request->city = 0; }else { $request->city = e($request->city); }
        $VillagesQuery = Village::where('city_id',$request->city);
        if($VillagesQuery->count() == 0){
            return [];
        }else{
            return $VillagesQuery->get()->toArray();
        }
    }


    public function categoryfromid(Request $request){
        $request->category ? e($request->category) : 0;
        $request->subcategory ? e($request->subcategory) : 0;
        $request->subsubcategory ? e($request->subsubcategory) : 0;
        if($request->subsubcategory == 0){
            if($request->subcategory == 0){
                if($request->category == 0){
                    return '';
                }else{
                    $CatQuery = Category::where([
                        ['id','=',e($request->category)],
                        ['removed','=',0]
                    ]);
                    if($CatQuery->count() > 0){
                        return $CatQuery->first()->name_1;
                    }else{
                        return '';
                    }
                }
            }else{
                $SubCatQuery = SubCategory::where([
                    ['id','=',e($request->subcategory)],
                    ['removed','=',0]
                ]);
                if($SubCatQuery->count() > 0){
                    $CatNameToShow = Category::where([
                        ['id','=',e($SubCatQuery->first()->category)],
                        ['removed','=',0]
                    ])->first()->name_1;
                    $SubCatNameToShow = $SubCatQuery->first()->name_1;
                    return "$CatNameToShow / $SubCatNameToShow";
                }else{
                    return '';
                }
            }
        }else{
            $SubSubCatQuery = SubSubCategory::where([
                ['id','=',e($request->subsubcategory)],
                ['removed','=',0]
            ]);
            if($SubSubCatQuery->count() > 0) {
                $CatNameToShow = Category::where([
                    ['id','=',e($SubSubCatQuery->first()->category)],
                    ['removed','=',0]
                ])->first()->name_1;
                $SubCatNameToShow = SubCategory::where([
                    ['id','=',e($SubSubCatQuery->first()->subcategory)],
                    ['removed','=',0]
                ])->first()->name_1;
                $SubSubCatNameToShow = $SubSubCatQuery->first()->name_1;
                return "$CatNameToShow / $SubCatNameToShow / $SubSubCatNameToShow";
            }else{
                return '';
            }
        }

    }
    public static function getcountryfromip($ip){

        $IpCountryQuery = IpCountry::where([
            ['ip_start', '>=', $ip],
            ['ip_end', '<=', $ip],
        ]);
        if($IpCountryQuery->count() > 0){
            return $IpCountryQuery->first()->country_id;
        }else{
            return 0;
        }
    }
    public function translate($lang){
        if(in_array($lang, ['en', 'ar'])){
            App::setLocale($lang);
            Session::put('locale', $lang);
        }
        return back();
    }

    public function ajaxselectstorecity(Request $request){
        if($request->data != null){ $request->data = e($request->data); }else{ $request->data = 0; }
        if($request->data == 0){
            if(session('selector.country.id') != null && session('selector.country.id') != 0):
                    $CountryIDToShoose = e(session('selector.country.id'));
            else:
                if(GeneralController::getcountryfromip(Request::ip()) != 0):
                    $CountryIDToShoose = e(GeneralController::getcountryfromip(Request::ip()));
                else:
                    $CountryIDToShoose = 2;
                endif;
            endif;
            $CountryToShooseFromAjaxSelect = Country::where('id',$CountryIDToShoose)->first();
            $result['id_city'] = 0;
            $result['name_city'] = __('كل المدن');
            $result['id_country'] = $CountryToShooseFromAjaxSelect->id;
            $result['name_country'] = $CountryToShooseFromAjaxSelect->name_ar;
        }else{
            $CITY_DATA_FROM_TOP = City::where('id', $request->data);
            if($CITY_DATA_FROM_TOP->count() > 0){
                $result['id_city'] = $CITY_DATA_FROM_TOP->first()->id;
                $result['name_city'] = $CITY_DATA_FROM_TOP->first()->name_ar;
                $result['id_country'] = $CITY_DATA_FROM_TOP->first()->country_id;
                $result['name_country'] = Country::where('id',$CITY_DATA_FROM_TOP->first()->country_id)->first()->name_ar;
            }else{
                $result['id_city'] = 0;
                $result['name_city'] = __('كل المدن');

            }
        }
        $request->session('selector.city.id',$result['id_city']);
        $request->session('selector.city.name',$result['name_city']);
        $request->session('selector.country.id',$result['id_country']);
        $request->session('selector.country.name',$result['name_country']);
        session('selector.city.id',$result['id_city']);
        session('selector.city.name',$result['name_city']);
        session('selector.country.id',$result['id_country']);
        session('selector.country.name',$result['name_country']);
        $request->session()->put('selector.city.id',$result['id_city']);
        $request->session()->put('selector.city.name',$result['name_city']);
        $request->session()->put('selector.country.id',$result['id_country']);
        $request->session()->put('selector.country.name',$result['name_country']);
        Session::put('selector.city.id',$result['id_city']);
        Session::put('selector.city.name',$result['name_city']);
        Session::put('selector.country.id',$result['id_country']);
        Session::put('selector.country.name',$result['name_country']);
        return $result;
    }

    public function rating(Request $request){
        if(!Auth::check() || session('user.id') == null || $request->id_to == null || $request->id_to == 0){
            return __('ليس لديك الحق في إتمام العملية');
        }
        $UserFrom = User::where([
            ['id','=',e(session('user.id'))],
            ['removed','=',0]
        ]);
        $UserTo = User::where([
            ['id','=',e($request->id_to)],
            ['removed','=',0]
        ]);
        if($UserFrom->count() <= 0 || $UserTo->count() <= 0){
            return __('ليس لديك الحق في إتمام العملية');
        }
        if($request->id_to == session('user.id')){
            return __('ليس لديك الحق في تقييم نفسك');
        }

        if($request->ratingResult == 0){ $request->rating_name = "0 نجوم"; }
        if($request->ratingResult == 1){ $request->rating_name = "1 نجوم"; }
        if($request->ratingResult == 2){ $request->rating_name = "2 نجوم"; }
        if($request->ratingResult == 3){ $request->rating_name = "3 نجوم"; }
        if($request->ratingResult == 4){ $request->rating_name = "4 نجوم"; }
        if($request->ratingResult == 5){ $request->rating_name = "5 نجوم"; }

        $RatingQuery = Rating::where([
            ['id_from','=',e(session('user.id'))],
            ['id_to','=',e($request->id_to)],
            ['removed','=',0]
        ]);
        if($RatingQuery->count() > 0) {
            $RatingQuery->update([
                'rating_name' => $request->rating_name,
                'rating_value' => $request->ratingResult,
            ]);
            return __('تم تعديل تقييمك بنجاح');
        }else{
            Rating::create([
                'id_from' => $UserFrom->first()->id,
                'name_from' => $UserFrom->first()->name,
                'email_from' => $UserFrom->first()->email,
                'phone_from' => $UserFrom->first()->phone,
                'id_to' => $UserTo->first()->id,
                'name_to' => $UserTo->first()->name,
                'email_to' => $UserTo->first()->email,
                'phone_to' => $UserTo->first()->phone,
                'rating_name' => $request->rating_name,
                'rating_value' => $request->ratingResult,
                'buyed' => 0,
                'removed' => 0,
            ]);
            return __('تمت إضافة تقييمك بنجاح');
        }



    }
    public function citiesfromcountries(Request $request){
        if($request->data == null){ $request->data = 0; }else { $request->data = e($request->data); }
        $Cities = City::where('country_id',$request->data)->get();
        $StringToSend = "";
        foreach($Cities as $City):
            $StringToSend .= "<option value='".e($City->id)."'>".e($City->name_ar)."</option>";
        endforeach;
        return $StringToSend;
    }
    public function areasfromcities(Request $request){
        if($request->data == null){ $request->data = 0; }else { $request->data = e($request->data); }
        $Areas = Area::where('city_id',$request->data)->get();
        $StringToSend = "";
        foreach($Areas as $Area):
            $StringToSend .= "<option value='".e($Area->id)."'>".e($Area->name_ar)."</option>";
        endforeach;
        return $StringToSend;
    }

    public function subcategoriesfromcategories(Request $request){
        if($request->data == null){ $request->data = 0; }else { $request->data = e($request->data); }
        $SubCategories = SubCategory::where('category',$request->data)->get();
        $StringToSend = "";
        foreach($SubCategories as $SubCategory):
            $StringToSend .= "<option value='".e($SubCategory->id)."'>".e($SubCategory->name_1)."</option>";
        endforeach;
        return $StringToSend;
    }

    public function subsubcategoriesfromsubcategories(Request $request){
        if($request->data == null){ $request->data = 0; }else { $request->data = e($request->data); }
        $SubSubCategories = SubSubCategory::where('subcategory',$request->data)->get();
        $StringToSend = "";
        foreach($SubSubCategories as $SubSubCategory):
            $StringToSend .= "<option value='".e($SubSubCategory->id)."'>".e($SubSubCategory->name_1)."</option>";
        endforeach;
        return $StringToSend;
    }

    public function searchtag(Request $request){
        if($request->tag != null): $request->tag = e($request->tag); endif;
        $AdsQuery = Ad::where([['valide','=',1],['banned','!=',1],['removed','=',0]]);
        $CountTags = 0;
        $ADS_IDS_TO_SEARCH = [];
        foreach($AdsQuery->get() as $Ad):
            $Ad->tags = strtolower($Ad->tags);
            if(strstr($Ad->tags , e($request->tag)) && $Ad->tags != null && $Ad->tags != ' '){
                if(strstr($Ad->tags, ',')){
                    $Tags = explode(',',$Ad->tags);
                }elseif(strstr($Ad->tags, ';')){
                    $Tags = explode(';',$Ad->tags);
                }else{
                    $Tags[] = e($Ad->tags);
                }
                foreach($Tags as $Tag):
                    if($Tag == $request->tag){
                        $CountTags ++;
                        $ADS_IDS_TO_SEARCH = array_merge([$Ad->id],$ADS_IDS_TO_SEARCH);
                    }
                endforeach;
            }
        endforeach;
        if($CountTags == 0){
            return view('pages.search.notfound');
        }else{
            $SearchAdsQuery = Ad::where([
                ['valide','=',1],['banned','!=',1],['removed','=',0]
            ])->find($ADS_IDS_TO_SEARCH);
            if($SearchAdsQuery->count() > 0):
                return view('pages.search.tags',[
                    'Tag' => e($request->tag),
                    'Ads' => $SearchAdsQuery,
                    'ResultCount' => $CountTags,
                ]);
            else:
                return view('pages.search.notfound');
            endif;
        }
    }
    public function search(Request $request){
        if($request->searchquery != null): $request->searchquery = e($request->searchquery); endif;
        if($request->searchcategory != null): $request->searchcategory = e($request->searchcategory); else: $request->searchcategory = 0; endif;
        if($request->searchcategory != 0):
            $AdsQuery = Ad::where([['title','LIKE','%'.e($request->searchquery).'%'],['id_category','=',e($request->searchcategory)],['valide','=',1],['banned','!=',1],['removed','=',0],])
                ->orWhere([['details','LIKE','%'.e($request->searchquery).'%'],['id_category','=',e($request->searchcategory)],['valide','=',1],['banned','!=',1],['removed','=',0],])
                ->orWhere([['name_country','LIKE','%'.e($request->searchquery).'%'],['id_category','=',e($request->searchcategory)],['valide','=',1],['banned','!=',1],['removed','=',0],])
                ->orWhere([['name_city','LIKE','%'.e($request->searchquery).'%'],['id_category','=',e($request->searchcategory)],['valide','=',1],['banned','!=',1],['removed','=',0],])
                ->orWhere([['name_subcategory','LIKE','%'.e($request->searchquery).'%'],['id_category','=',e($request->searchcategory)],['valide','=',1],['banned','!=',1],['removed','=',0],])
                ->orWhere([['name_owner','LIKE','%'.e($request->searchquery).'%'],['id_category','=',e($request->searchcategory)],['valide','=',1],['banned','!=',1],['removed','=',0],]);
        else:
            $AdsQuery = Ad::where([['title','LIKE','%'.e($request->searchquery).'%'],['valide','=',1],['banned','!=',1],['removed','=',0],])
                ->orWhere([['details','LIKE','%'.e($request->searchquery).'%'],['valide','=',1],['banned','!=',1],['removed','=',0],])
                ->orWhere([['name_country','LIKE','%'.e($request->searchquery).'%'],['valide','=',1],['banned','!=',1],['removed','=',0],])
                ->orWhere([['name_city','LIKE','%'.e($request->searchquery).'%'],['valide','=',1],['banned','!=',1],['removed','=',0],])
                ->orWhere([['name_owner','LIKE','%'.e($request->searchquery).'%'],['valide','=',1],['banned','!=',1],['removed','=',0],]);
        endif;
        if($request->searchcategory != 0):
            $SearchCategoryName = Category::where('id',e($request->searchcategory))->first()->name_1;
        else:
            $SearchCategoryName = 'كل الأقسام';
        endif;
        if(session('user.id') != null):
            $SearchUserId = e(session('user.id'));
        else:
            $SearchUserId = 0;
        endif;
        $IDSEARCH = Search::create([
            'id_owner' => $SearchUserId,
            'searchquery' => e($request->searchquery),
            'id_category' => e($request->searchcategory),
            'name_category' => $SearchCategoryName,
        ]);

        if($AdsQuery->count() > 0):
            return view('pages.search.index',[
                'IDSEARCH' => $IDSEARCH->id,
                'Ads' => $AdsQuery->get(),
                'ResultCount' => $AdsQuery->count(),
            ]);
        else:
            return view('pages.search.notfound',[
                'IDSEARCH' => $IDSEARCH->id,
            ]);
        endif;
    }

    public function searchlikeadd(Request $request){
        if($request->id == null): $request->id = 0; else: $request->id = e($request->id); endif;
        if(session('user.id') != null): $SearchUserIdToLike = e(session('user.id')); else: return redirect()->back()->with('error',__('ليس لديكم الحق لإتمام العملية')); endif;
        $SearchQuery = Search::where([
            ['id','=', e($request->id)],
            ['id_owner','=', e($SearchUserIdToLike)],
            ['removed','=',0]
        ]);
        if($SearchQuery->count() > 0){
            $SearchQuery->update(['liked' => 1]);
            return redirect()->back()->with('success',__('تمت إضافة البحث إلى المفضلة بنجاح'));
        }else{
            return redirect()->back()->with('error',__('ليس لديكم الحق لإتمام العملية'));
        }
    }

    public function notfound(Request $request){
        return redirect(route('error404'));
    }

    public static function getFooterPages(){
        return Page::where([
            ['valide','=',1],
            ['removed','=',0]
        ])->get();
    }


    public function error404(Request $request){
        return view('errors.404');
    }
    public function error401(Request $request){
        return view('errors.404');
    }
    public function error403(Request $request){
        return view('errors.404');
    }
    public function error500(Request $request){
        return view('errors.404');
    }
}
