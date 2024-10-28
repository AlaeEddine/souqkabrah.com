<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Setting;
use App\Models\Country;
use App\Models\City;
use App\Models\Village;
use App\Models\Filter;
use App\Models\CarsData;
use App\Models\CarsBrand;
use App\Models\Category;
use App\Models\Currency;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{

    public function adsremove(Request $request){
        if(session('user.id') != null && $request->ads != null){
            $AdsQuery = Ad::where('id',e($request->ads));
            if($AdsQuery->count()>0){
                if($AdsQuery->get()->first()->id_owner == session('user.id')){
                    $AdsQuery->update(['removed'=> 1]);
                    return redirect()->back()->with('success',__('تم الحدف بنجاح'));
                }else{
                    return redirect()->back()->with('error',__('ليس لديك الحق حدف الإعلان'));
                }
            }else{
                return redirect()->back()->with('error',__('الإعلان غير موجود'));
            }
        }else{
            return redirect()->back()->with('error',__('المرجو المحاولة مرة أخرى'));
        }
    }

    public function storesshow(){
        return view('pages.category.stores');
    }

    public static function AdsHome(){
        $APPEND_CONDITIONS = [
            ['valide','=',1],
            ['banned', '!=',1],
            ['home', '=',1],
            ['removed','=',0]
        ];
        if(session('selector.city.id') != null){
            $APPEND_CONDITIONS = array_merge($APPEND_CONDITIONS, [['id_city','=',e(session('selector.city.id'))],['valide','=',1]]);
        }
        if(session('selector.country.id') != null){
            $APPEND_CONDITIONS = array_merge($APPEND_CONDITIONS, [['id_country','=',e(session('selector.country.id'))],['valide','=',1]]);
        }
        $AdsQuery = Ad::where($APPEND_CONDITIONS);
        if($AdsQuery->count() > 0){
            return $AdsQuery->get();
        }else{
            return [];
        }
    }

    public function uploadpicturessubmit(Request $request) {
        $request->validate([
            'file' => 'max:10000',
        ]);
        if ($request->hasFile('file')) {
            $files = $request->file('file');
            foreach($files as $k=>$file):
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $fileName = rand(0,9999).'-'.sha1(date('Y-m-d H:i:s')).'.'.sha1($filename).'.'.$extension;
                $destinationPath = public_path('/uploads/ads/');
                $file->move($destinationPath, $fileName);
                $picturesurl[$k] = '/uploads/ads/'.$fileName;
            endforeach;
            $Field = "";
            foreach($picturesurl as $Fields):
                $Field .="<input type='hidden' name='pictures[]' value='$Fields' />";
            endforeach;
            return $Field;

        }else{
            return null;
        }
    }


    public function uploadcoversubmit(Request $request) {
        $request->validate([
            'cover' => 'max:10000',
        ]);
        if ($request->hasFile('cover')) {
            $files = $request->file('cover');
            foreach($files as $k=>$file):
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $fileName = rand(0,9999).'-'.sha1(date('Y-m-d H:i:s')).'.'.sha1($filename).'.'.$extension;
                $destinationPath = public_path('/uploads/ads/');
                $file->move($destinationPath, $fileName);
                $picturesurl = '/uploads/ads/'.$fileName;
                return $picturesurl;
            endforeach;

        }else{
            return null;
        }
    }
    public function uploadvideosubmit(Request $request) {
        if($request->video1 != null): $PictureFieldName = "video1";  $PictureField = $request->video1; endif;
        if($request->video2 != null): $PictureFieldName = "video2";  $PictureField = $request->video2; endif;
        if($request->video3 != null): $PictureFieldName = "video3";  $PictureField = $request->video3; endif;
        $request->validate([
            "$PictureFieldName" => 'max:10000',
        ]);
        if ($request->hasFile($PictureFieldName)) {
            $files = $request->file($PictureFieldName);
            foreach($files as $k=>$file):
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $fileName = rand(0,9999).'-'.sha1(date('Y-m-d H:i:s')).'.'.sha1($filename).'.'.$extension;
                $destinationPath = public_path('/uploads/ads/');
                $file->move($destinationPath, $fileName);
                $videosurl = '/uploads/ads/'.$fileName;
                return $videosurl;
            endforeach;

        }else{
            return null;
        }
    }
    public function uploadpicturesubmit(Request $request) {
        if($request->picture1 != null): $PictureFieldName = "picture1";  $PictureField = $request->picture1; endif;
        if($request->picture2 != null): $PictureFieldName = "picture2";  $PictureField = $request->picture2; endif;
        if($request->picture3 != null): $PictureFieldName = "picture3";  $PictureField = $request->picture3; endif;
        if($request->picture4 != null): $PictureFieldName = "picture4";  $PictureField = $request->picture4; endif;
        if($request->picture5 != null): $PictureFieldName = "picture5";  $PictureField = $request->picture5; endif;
        if($request->picture6 != null): $PictureFieldName = "picture6";  $PictureField = $request->picture6; endif;
        if($request->picture7 != null): $PictureFieldName = "picture7";  $PictureField = $request->picture7; endif;
        if($request->picture8 != null): $PictureFieldName = "picture8";  $PictureField = $request->picture8; endif;
        if($request->picture9 != null): $PictureFieldName = "picture9";  $PictureField = $request->picture9; endif;
        if($request->picture10 != null): $PictureFieldName = "picture10"; $PictureField = $request->picture10; endif;
        if($request->picture11 != null): $PictureFieldName = "picture11"; $PictureField = $request->picture11; endif;
        if($request->picture12 != null): $PictureFieldName = "picture12"; $PictureField = $request->picture12; endif;
        if($request->picture13 != null): $PictureFieldName = "picture13"; $PictureField = $request->picture13; endif;
        if($request->picture14 != null): $PictureFieldName = "picture14"; $PictureField = $request->picture14; endif;
        if($request->picture15 != null): $PictureFieldName = "picture15"; $PictureField = $request->picture15; endif;
        if($request->picture16 != null): $PictureFieldName = "picture16"; $PictureField = $request->picture16; endif;
        if($request->picture17 != null): $PictureFieldName = "picture17"; $PictureField = $request->picture17; endif;
        if($request->picture18 != null): $PictureFieldName = "picture18"; $PictureField = $request->picture18; endif;
        if($request->picture19 != null): $PictureFieldName = "picture19"; $PictureField = $request->picture19; endif;
        if($request->picture20 != null): $PictureFieldName = "picture20"; $PictureField = $request->picture20; endif;
        if($request->picture21 != null): $PictureFieldName = "picture21"; $PictureField = $request->picture21; endif;
        if($request->picture22 != null): $PictureFieldName = "picture22"; $PictureField = $request->picture22; endif;
        if($request->picture23 != null): $PictureFieldName = "picture23"; $PictureField = $request->picture23; endif;
        if($request->picture24 != null): $PictureFieldName = "picture24"; $PictureField = $request->picture24; endif;
        if($request->picture25 != null): $PictureFieldName = "picture25"; $PictureField = $request->picture25; endif;
        if($request->picture26 != null): $PictureFieldName = "picture26"; $PictureField = $request->picture26; endif;
        if($request->picture27 != null): $PictureFieldName = "picture27"; $PictureField = $request->picture27; endif;
        if($request->picture28 != null): $PictureFieldName = "picture28"; $PictureField = $request->picture28; endif;
        if($request->picture29 != null): $PictureFieldName = "picture29"; $PictureField = $request->picture29; endif;
        if($request->picture30 != null): $PictureFieldName = "picture30"; $PictureField = $request->picture30; endif;
        $request->validate([
            "$PictureFieldName" => 'max:10000',
        ]);
        if ($request->hasFile($PictureFieldName)) {
            $files = $request->file($PictureFieldName);
            foreach($files as $k=>$file):
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $fileName = rand(0,9999).'-'.sha1(date('Y-m-d H:i:s')).'.'.sha1($filename).'.'.$extension;
                $destinationPath = public_path('/uploads/ads/');
                $file->move($destinationPath, $fileName);
                $picturesurl = '/uploads/ads/'.$fileName;
                return $picturesurl;
            endforeach;

        }else{
            return null;
        }
    }
    public function createadssubmit(Request $request){
        $DATA_TO_INSERT = [];
        if($request->pictures != null){
            foreach($request->pictures as $K=>$PictureLink):
                $DATA_TO_INSERT = array_merge(["picture".($K+1) => $PictureLink],$DATA_TO_INSERT);
            endforeach;
        }
        if(session('user.email') != null){
            $request->id_contact = 1;
            $NameContact = 'البريد الإلكتروني';
        }
        if(session('user.phone') != null){
            $request->id_contact = 0;
            $NameContact = 'رقم الجوال';
        }
        if($request->status == 0 || $request->status == 3){
            $request->status = e($request->status);
        }else{
            $request->status = 2;
        }
        $Setting = Setting::where('id',1)->first();
        if($Setting->allowfilter == 1){
            $FilterQuery = Filter::where([
                ['removed','=',0]
            ]);
            if($FilterQuery->count() > 0){
                foreach($FilterQuery->get() as $Filter):
                    if(strstr($request->title,e($Filter->keywordAd))){
                        $request->status = 2;
                    }
                endforeach;
            }
        }
        if($request->id_sub_sub_category == null || $request->id_sub_sub_category == 0 || $request->id_sub_sub_category == '0') {
            $ID_SUB_SUB = 0;
            $NAME_SUB_SUB = null;
        }else{
            $NAME_SUB_SUB = e(SubSubCategory::where('id', e($request->id_sub_sub_category))->first()->name_1);
            $ID_SUB_SUB = e(SubSubCategory::where('id', e($request->id_sub_sub_category))->first()->id);
        }
        if($Setting->showadusers == 0):
            $request->valide = -1;
        else:
            $request->valide = 1;
        endif;
            
        $DATA_TO_INSERT = array_merge([
            'title' => e($request->title),
            'cover' => e($request->cover),
            'picture1' => e($request->picture1),
            'picture2' => e($request->picture2),
            'picture3' => e($request->picture3),
            'picture4' => e($request->picture4),
            'picture5' => e($request->picture5),
            'picture6' => e($request->picture6),
            'picture7' => e($request->picture7),
            'picture8' => e($request->picture8),
            'picture9' => e($request->picture9),
            'picture10' => e($request->picture10),
            'picture11' => e($request->picture11),
            'picture12' => e($request->picture12),
            'picture13' => e($request->picture13),
            'picture14' => e($request->picture14),
            'picture15' => e($request->picture15),
            'picture16' => e($request->picture16),
            'picture17' => e($request->picture17),
            'picture18' => e($request->picture18),
            'picture19' => e($request->picture19),
            'picture20' => e($request->picture20),
            'picture21' => e($request->picture21),
            'picture22' => e($request->picture22),
            'picture23' => e($request->picture23),
            'picture24' => e($request->picture24),
            'picture25' => e($request->picture25),
            'picture26' => e($request->picture26),
            'picture27' => e($request->picture27),
            'picture28' => e($request->picture28),
            'picture29' => e($request->picture29),
            'picture30' => e($request->picture30),
            'id_country' => e($request->country),
            'name_country' => e(Country::where('id', e($request->country))->first()->name_ar),
            'id_city' => e($request->city),
            'name_city' => e(City::where('id', e($request->city))->first()->name_ar),
            'id_village' => e($request->village),
            'name_village' => e(Village::where('id',e($request->village))->get()->first()->name_ar),
            'status' => e($request->status),
            'id_currency' => e($request->currency),
            'name_currency' => e(Currency::where([['removed','=',0],['id','=',e($request->currency)]])->first()->symbol),
            'price' => e($request->price),
            'id_contact' => e($request->id_contact),
            'name_contact' => e($NameContact),
            'id_owner' => e(session('user.id')),
            'name_owner' => e(session('user.name')),
            'id_category' => e($request->id_category),
            'name_category' => e(Category::where('id', e($request->id_category))->first()->name_1),
            'id_subcategory' => e($request->id_sub_category),
            'name_subcategory' => e(SubCategory::where('id', e($request->id_sub_category))->first()->name_1),
            'id_subsubcategory' => e($ID_SUB_SUB),
            'name_subsubcategory' => e($NAME_SUB_SUB),
            'valide' => $request->valide,
            'details' => e($request->details),
            'tags' => e($request->tags),
        ],$DATA_TO_INSERT);
        $ID_ADS_CREATE = Ad::create($DATA_TO_INSERT);
        if($request->id_sub_category == 1 || $request->id_sub_category == 2 || $request->id_sub_category == '1' || $request->id_sub_category == '2'){
            if(CarsData::where('id_ads',e($ID_ADS_CREATE->id))->count()>0){
                CarsData::where('id_ads',e($ID_ADS_CREATE->id))->update([
                    'id_brand' => e($request->id_brand),
                    'name_brand' => e(CarsBrand::where('id',e($request->id_brand))->first()->id),
                    'model' => e($request->model),
                    'submodel' => e($request->submodel),
                    'year' => e($request->year),
                    'bodywork' => e($request->bodywork),
                    'km' => e($request->km),
                    'chairs_number' => e($request->chairs_number),
                    'gazoil_or_not' => e($request->gazoil_or_not),
                    'manual_or_automatic' => e($request->manual_or_automatic),
                    'motor_cc' => e($request->motor_cc),
                    'battery_size' => e($request->battery_size),
                    'battery_life' => e($request->battery_life),
                    'color_external' => e($request->color_external),
                    'color_internal' => e($request->color_internal),
                    'details_external' => e($request->details_external),
                    'details_internal' => e($request->details_internal),
                    'technical_details' => e($request->technical_details),
                    'geo_details' => e($request->geo_details),
                    'brand_country' => e($request->brand_country),
                    'license' => e($request->license),
                    'insurance' => e($request->insurance),
                    'customs' => e($request->customs),
                    'chassis_condition' => e($request->chassis_condition),
                    'painting' => e($request->painting),
                    'payment_method' => e($request->payment_method),
                    'ad_type' => e($request->ad_type),
                    'rental_period' => e($request->rental_period),
                ]);
            }else{
                CarsData::create([
                    'id_ads' => e($ID_ADS_CREATE->id),
                    'id_brand' => e($request->id_brand),
                    'name_brand' => e(CarsBrand::where('id',e($request->id_brand))->first()->id),
                    'model' => e($request->model),
                    'submodel' => e($request->submodel),
                    'year' => e($request->year),
                    'bodywork' => e($request->bodywork),
                    'km' => e($request->km),
                    'chairs_number' => e($request->chairs_number),
                    'gazoil_or_not' => e($request->gazoil_or_not),
                    'manual_or_automatic' => e($request->manual_or_automatic),
                    'motor_cc' => e($request->motor_cc),
                    'battery_size' => e($request->battery_size),
                    'battery_life' => e($request->battery_life),
                    'color_external' => e($request->color_external),
                    'color_internal' => e($request->color_internal),
                    'details_external' => e($request->details_external),
                    'details_internal' => e($request->details_internal),
                    'technical_details' => e($request->technical_details),
                    'geo_details' => e($request->geo_details),
                    'brand_country' => e($request->brand_country),
                    'license' => e($request->license),
                    'insurance' => e($request->insurance),
                    'customs' => e($request->customs),
                    'chassis_condition' => e($request->chassis_condition),
                    'painting' => e($request->painting),
                    'payment_method' => e($request->payment_method),
                    'ad_type' => e($request->ad_type),
                    'rental_period' => e($request->rental_period),
                ]);
            }
        }
        if($Setting->conditionpayedads == 1):
            $AdsCounter = Ad::where([
                ['id_owner','=', e(session('user.id'))],
                ['removed','=',0]
            ])->count();
            if(in_array($request->id_category, str_split($Setting->conditionpayedadscategories))){
                if($AdsCounter >5){
                    Ad::where('id',$ID_ADS_CREATE->id)->update([
                        'removed' => 0
                    ]);
                    return redirect(route('payment.request',[$ID_ADS_CREATE->id]));
                }
            }
        endif;
        return redirect(route('ads', [$ID_ADS_CREATE->id]))->with('success',__('تمت الإضافة بنجاح'));

    }
    public  function paymentabort(Request $request){
        return view('pages.payment.abort',[
            'ads_id' => e($request->ads_id)
        ]);
    }

    public  function paymentok(Request $request){
        Ad::where('id',e($request->ads_id))->update(['removed' => 0]);
        return view('pages.payment.ok',[
            'ads_id' => e($request->ads_id)
        ]);
    }

    public function paymentrequest(Request $request){
        return view('pages.payment.request',[
            'ads_id' => e($request->ads_id)
        ]);
    }

    public function createads(Request $request){
        if(!Auth::check()):
            abort('404');
        endif;
        $AdsCount = Ad::where([
            ['id_owner', '=',e(session('user.id'))],
            ['banned', '!=',1],
            ['removed','=',0]
        ])->count();
        return view('pages.ads.create');
    }

    public function show(Request $request){
        $Setting = Setting::where('id',1)->first();

        if($request->ads == null): $request->ads = 0; else: $request->ads = e($request->ads); endif;
        //if($Setting->showadanonymous == 1):
            //if(!Auth::check()):
                //abort('404');

            //endif;
        //endif;
        $APPEND_CONDITIONS = [
            ['id','=',e($request->ads)],
            ['banned', '!=',1],
            ['removed','=',0]
        ];
        /*if(session('user.city.id') != null){
            $APPEND_CONDITIONS = array_merge($APPEND_CONDITIONS, [['id_city','=',e(session('user.city.id'))],['valide','=',1]]);
        }*/
        if(session('user.country.id') != null){
            $APPEND_CONDITIONS = array_merge($APPEND_CONDITIONS, [['id_country','=',e(session('user.country.id'))]]);
        }
        $AdsQuery = Ad::where($APPEND_CONDITIONS);
        if($AdsQuery->count() > 0) {
            $UserID = $AdsQuery->first()->id_owner;
            if($UserID == 0) {
                $UserData = User::where([
                    ['id','=',1],
                    ['removed','=',0]
                ])->first();
            }else{
                $UserData = User::where([
                    ['id','=',e($UserID)],
                    ['removed','=',0]
                ])->first();
            }
            $AdDetails = $AdsQuery->first();
            $AdUrl = route('ads.show', [$AdDetails->id_category,UserController::slug($AdDetails->name_category),$AdDetails->id_subcategory,UserController::slug($AdDetails->name_subcategory), $AdDetails->id,UserController::slug($AdDetails->title)]);
            return view('pages.ads.index',[
                'Ad' => $AdDetails,
                'AdUrl' => $AdUrl,
                'Setting' => $Setting,
                'User' => $UserData,
                'CountComments1' => Comment::where([
                    ['valide','=',1],
                    ['id_ads', '=',e($request->ads)],
                    ['banned', '!=',1],
                    ['removed','=',0]
                ])->count(),
                'CountComments0' => Comment::where([
                    ['id_ads', '=',e($request->ads)],
                    ['banned', '!=',1],
                    ['removed','=',0]
                ])->count(),
                'Comments1' => Comment::where([
                    ['valide','=',1],
                    ['id_ads', '=',e($request->ads)],
                    ['banned', '!=',1],
                    ['removed','=',0]
                ])->get(),
                'Comments0' => Comment::where([
                    ['id_ads', '=',e($request->ads)],
                    ['banned', '!=',1],
                    ['removed','=',0]
                ])->get(),
            ]);
        }else{
            // Check if user is owner of ads
            $APPEND_CONDITIONS2 = [
                ['id','=',e($request->ads)],
                ['id_owner','!=',0],
                ['id_owner','=',e(session('user.id'))],
                ['banned', '!=',1],
                ['removed','=',0]
            ];
            /*if(session('selector.city.id') != null){
                $APPEND_CONDITIONS2 = array_merge($APPEND_CONDITIONS2, [['id_city','=',e(session('selector.city.id'))],['valide','=',1]]);
            }*/
            if(session('user.country.id') != null){
                $APPEND_CONDITIONS2 = array_merge($APPEND_CONDITIONS2, [['id_country','=',e(session('user.country.id'))]]);
            }
            $AdsQuery2 = Ad::where($APPEND_CONDITIONS2);
            if($AdsQuery2->count() > 0){
                $UserID2 = $AdsQuery2->first()->id_owner;
                if($UserID2 == 0) {
                    $UserData2 = User::where([
                        ['id','=',1],
                        ['removed','=',0]
                    ])->first();
                }else{
                    $UserData2 = User::where([
                        ['id','=',e($UserID2)],
                        ['removed','=',0]
                    ])->first();
                }
                $AdDetails2 = $AdsQuery2->first();
                $AdUrl2 = route('ads.show', [$AdDetails2->id_category,UserController::slug($AdDetails2->name_category),$AdDetails2->id_subcategory,UserController::slug($AdDetails2->name_subcategory), $AdDetails2->id,UserController::slug($AdDetails2->title)]);
                return view('pages.ads.index',[
                    'Ad' => $AdDetails2,
                    'AdUrl' => $AdUrl2,
                    'Setting' => $Setting,
                    'User' => $UserData2,
                    'CountComments1' => Comment::where([
                        ['valide','=',1],
                        ['id_ads', '=',e($request->ads)],
                        ['removed','=',0]
                    ])->count(),
                    'CountComments0' => Comment::where([
                        ['id_ads', '=',e($request->ads)],
                        ['removed','=',0]
                    ])->count(),
                    'Comments1' => Comment::where([
                        ['valide','=',1],
                        ['id_ads', '=',e($request->ads)],
                        ['removed','=',0]
                    ])->get(),
                    'Comments0' => Comment::where([
                        ['id_ads', '=',e($request->ads)],
                        ['removed','=',0]
                    ])->get(),
                ]);

            }else{
                abort('404');
            }
        }
    }
/**************** Comments  */
    public function redirecttoads(Request $request){
        if($request->ads == null): $request->ads = 0; else: $request->ads = e($request->ads); endif;
        $APPEND_CONDITIONS =[
            ['id','=',e($request->ads)],
            ['banned', '!=',1],
            ['removed','=',0]
        ];
        if(session('selector.city.id') != null){
            $APPEND_CONDITIONS = array_merge($APPEND_CONDITIONS, [['id_city','=',e(session('selector.city.id'))],['valide','=',1]]);
        }
        if(session('selector.country.id') != null){
            $APPEND_CONDITIONS = array_merge($APPEND_CONDITIONS, [['id_country','=',e(session('selector.country.id'))],['valide','=',1]]);
        }
        $AdsQuery = Ad::where($APPEND_CONDITIONS);
        if($AdsQuery->count() > 0) {
            return redirect(route('ads',[e($request->ads)]));
        }else{
            abort('404');
        }
    }
    public function reportads(Request $request){
        if($request->id == null): $request->id = 0; else: $request->id = e($request->id); endif;
        $APPEND_CONDITIONS = [
            ['id','=',e($request->id)],
            ['removed','=',0]
        ];
        /*if(session('selector.city.id') != null){
            $APPEND_CONDITIONS = array_merge($APPEND_CONDITIONS, [['id_city','=',e(session('selector.city.id'))],['valide','=',1]]);
        }
        if(session('selector.country.id') != null){
            $APPEND_CONDITIONS = array_merge($APPEND_CONDITIONS, [['id_country','=',e(session('selector.country.id'))],['valide','=',1]]);
        }*/
        $AdsQuery = Ad::where($APPEND_CONDITIONS);

        if($AdsQuery->count() > 0) {
            $AdsQuery->update([
                'banned' => '-1',
            ]);
            return redirect()->back()->with('success',__('تم إرسال التبليغ عن الإعلان و سيتم دراسته من طرف الإدارة'));
        }else{
            return redirect()->back()->with('error',__('لم يتم إرسال التبليغ عن الإعلان'));
        }
    }

    public function reportcomments(Request $request){
        if($request->id == null): $request->id = 0; else: $request->id = e($request->id); endif;
        if($request->ads == null): $request->ads = 0; else: $request->ads = e($request->ads); endif;
        $CommentsQuery = Comment::where([
            ['id','=',e($request->id)],
            ['id_ads','=',e($request->ads)],
            ['banned', '!=',1],
            ['removed','=',0]
        ]);
        if($CommentsQuery->count() > 0) {
            $CommentsQuery->update([
                'banned' => '-1',
            ]);
            return redirect(route('ads',[e($request->ads)]))->with('success',__('تم إرسال التبليغ عن التعليق و سيتم دراسته من طرف الإدارة'));
        }else{
            abort('404');
        }
    }
    public function commentscreatesubmit(Request $request){
        if($request->ads == null): $request->ads = 0; else: $request->ads = e($request->ads); endif;
        if(!Auth::check() || session('user.id') == null){
            return redirect(route('login'))->with('error',__('يجب عليك تسجيل الدخول لتتمكن من كتابة تعليق'));
        }

        $AdsQuery = Ad::where([
            ['id','=',e($request->ads)],
            ['banned', '!=',1],
            ['removed','=',0]
        ]);
        if($AdsQuery->count() > 0) {
            $UserQuery = User::where([
                ['id','=',e(session('user.id'))],
                ['banned', '!=',1],
                ['removed','=',0]
            ]);
            if($UserQuery->count() > 0) {
                $AdOwnerData = User::where([
                    ['id','=',e($AdsQuery->first()->id_owner)],
                    ['banned', '!=',1],
                    ['removed','=',0]
                ]);
                Comment::create([
                    'id_from' => e($UserQuery->first()->id),
                    'name_from' => e($UserQuery->first()->name),
                    'email_from' => e($UserQuery->first()->email),
                    'phone_from' => e($UserQuery->first()->phone),
                    'id_to' => e($AdOwnerData->first()->id),
                    'name_to' => e($AdOwnerData->first()->name),
                    'email_to' => e($AdOwnerData->first()->email),
                    'phone_to' => e($AdOwnerData->first()->phone),
                    'id_ads' => e($AdsQuery->first()->id),
                    'title_ads' => e($AdsQuery->first()->title),
                    'id_category' => e($AdsQuery->first()->id_category),
                    'id_subcategory' => e($AdsQuery->first()->id_subcategory),
                    'id_subsubcategory' => e($AdsQuery->first()->id_subsubcategory),
                    'comment' => e($request->comment),
                    'level' => 0,
                    'valide' => -1,
                    'banned' => 0,
                    'removed' => 0,
                ]);
                return redirect(route('ads',[e($request->ads)]))->with('success',__('تمت إضافة التعليق بنجاح. ستتمكن من مشاهدته عندما يتم تفعيله من طرف الإدارة'));
            }else{
                abort('404');
            }
        }else{
            abort('404');
        }

    }
    /*
    public function commentscreatesubmit(Request $request){
        if($request->ads == null): $request->ads = 0; else: $request->ads = e($request->ads); endif;
        $AdsQuery = Ad::where([
            ['id','=',e($request->ads)],
            ['banned', '!=',1],
            ['removed','=',0]
        ]);
        if($AdsQuery->count() > 0) {
            $UserData = User::where([
                ['email', '=', e($request->email)],
                ['removed','=',0],
            ]);
            if($UserData->count() > 0) {
                if(!Auth::check()){
                    return redirect(route('login'))->with('error',__('يجب عليك تسجيل الدخول لتتمكن من استعمال البريد الإلكتروني'));
                }
                if(session('user.email') == e($request->email)){
                    $request->id_from = e($UserData->first()->id);
                    $request->name_from = e($UserData->first()->name);
                    $request->email_from = e($UserData->first()->email);
                    $request->phone_from = e($UserData->first()->phone);
                    // CREATE
                    dd('You Can create a Comment');
                }else{
                    return redirect(route('ads',[e($request->ads)]))->with('error',__('ليس لديكم الحق في استعمال بريد إلكتروني خاص بعضو آخر'));
                }
            }else{
                $request->id_from = 0;
                $request->name_from = e($request->name);
                $request->email_from = e($request->email);
                $request->phone_from = NULL;
                // CREATE
                dd('You Can create a Comment');
            }
            //Comment::insert([]);
            return redirect(route('ads',[e($request->ads)]));
        }else{
            abort('404');
        }

    }*/
}

