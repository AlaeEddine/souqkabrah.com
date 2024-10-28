<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Ad;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    public static function countLikes() {
        if(!Auth::check()){
            return 0;
        }else{
            $LikesQuery = Like::where([
                ['id','=' => e(Auth::id())],
                ['removed','=',0]
            ]);
            if($LikesQuery->count() > 0){
                return $LikesQuery->count();
            }else{
                return 0;
            }
        }
    }

    public function likesadd(Request $request){
        if($request->id == null): $request->id = 0; else: $request->id = e($request->id); endif;
        $AdsQuery = Ad::where([
            ['id','=',e($request->id)],
            ['banned' , '!=',1],
            ['removed','=',0]
        ]);
        if($AdsQuery->count() > 0) {
            $LikesQuery = Like::where([
                ['id_from','=',e(session('user.id'))],
                ['id_ads','=',e($request->id)],
                ['removed','=',0],
            ]);
            if($LikesQuery->count() > 0) {
                return redirect(route('ads',[e($request->id)]))->with('error',__('الإعلان موجود في قائمة المفضلة'));
            }else{
                $AdOwner = User::where([
                    ['id','=',e($AdsQuery->first()->id_owner)],
                ]);
                if($AdOwner->count() > 0):
                    Like::create([
                        'id_from' => e(session('user.id')),
                        'name_from' => e(session('user.name')),
                        'email_from' => e(session('user.email')),
                        'phone_from' => e(session('user.phone')),
                        'id_to' => e($AdsQuery->first()->id_owner),
                        'name_to' => e($AdOwner->first()->name),
                        'email_to' => e($AdOwner->first()->email),
                        'phone_to' => e($AdOwner->first()->phone),
                        'id_category' => e($AdsQuery->first()->id_category),
                        'title_category' => e($AdsQuery->first()->name_category),
                        'id_subcategory' => e($AdsQuery->first()->id_subcategory),
                        'title_subcategory' => e($AdsQuery->first()->name_subcategory),
                        'id_subsubcategory' => e($AdsQuery->first()->id_subsubcategory),
                        'title_subsubcategory' => e($AdsQuery->first()->name_subsubcategory),
                        'id_ads' => e($AdsQuery->first()->id),
                        'title_ads' => e($AdsQuery->first()->title),
                        'removed' => 0,
                    ]);
                    return redirect(route('ads',[e($request->id)]))->with('success',__('تمت إضافة الإعلان إلى قائمة المفضلة'));
                else:
                    return redirect(route('ads',[e($request->id)]))->with('error',__('ليس لديكم الحق في إضافة الإعلان إلى قائمة المفضلة'));

                endif;
            }
        }else{
            abort('404');
        }
    }
}
