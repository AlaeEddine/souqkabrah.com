<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Like;
use App\Models\User;
use App\Models\SeenAd;
use App\Models\Country;
use App\Models\City;
use App\Models\Plan;
use App\Models\Search;
use App\Models\UploadFile;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccountController extends Controller
{

    public function cv(Request $request){
        $UserQuery = User::where([
            ['id','=',e(session('user.id'))],
            ['removed','=',0]
        ]);
        if($UserQuery->count() > 0) {
            return view('pages.account.cv.index',[
                'User' => $UserQuery->first(),
            ]);
        }else{
            abort('404');
        }
    }


    public function friends(Request $request) {
        if($request->link == null){
            abort('404');
        }
        $UserQuery = User::where([
            ['link','=',UserController::slug(e($request->link),'-')],
            ['banned', '!=',1],
            ['removed','=',0]
        ]);
        if($UserQuery->count() > 0){
            return view('pages.account.friends',[
                'User' => $UserQuery->first(),
            ]);
        }else{
            abort('404');
        }
    }
    public function getprofilepage(Request $request){
        if($request->link == null){
            abort('404');
        }
        $UserQuery = User::where([
            ['link','=',UserController::slug(e($request->link),'-')],
            ['removed','=',0]
        ]);
        if($UserQuery->count() > 0) {
            $AdsQuery = Ad::where([
                ['id_owner', '=',e($UserQuery->first()->id)],
                ['banned', '!=',1],
                ['removed','=',0]
            ]);
            return view('pages.account.profile.index',[
                'User' => $UserQuery->first(),
                'CountUser' => $UserQuery->count(),
                'CountAds' => $AdsQuery->count(),
                'Ads' => $AdsQuery->get(),
            ]);
        }else{
            abort('404');
        }
    }

    public static function uploadprofilesubmit(Request $request){
        $request->validate([
            'file' => 'max:10000',
        ]);
        if ($request->hasFile('file')) {
            $files = $request->file('file');
            foreach($files as $k=>$file):
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $fileName = rand(0,9999).'-'.sha1(date('Y-m-d H:i:s')).'.'.sha1($filename).'.'.$extension;
                $destinationPath = public_path('/uploads/profiles/');
                $file->move($destinationPath, $fileName);
                $picturesurl = '/uploads/profiles/'.$fileName;
                return $picturesurl;
            endforeach;

        }else{
            return null;
        }
    }

public static function countprofileseen() {
    return User::where([
        ['id','=',e(session('user.id'))],
        ['removed','=',0]
    ])->first()->seen;
}
    public function submiteditaccount(Request $request) {
        if($request->hidephone != null){ $request->hidephone = 1; }else{ $request->hidephone = 0; }
        $request->validate([
            'link' => ['required',Rule::unique('users','link')->where('removed', 0)->ignore(e(session('user.id')))],
            'phone' => [Rule::unique('users','phone')->where('removed', 0)->ignore(e(session('user.id')))]
        ]);
        $DATA_TO_UPDATE = [
            'name' => e($request->name),
            'link' => Str::slug(e($request->link),'-'),
            'phone' => e($request->phone),
            'gender' => e($request->gender),
            'birthday' => e($request->birthday),
            'picture' => e($request->picture),
            'id_country' => e($request->country),
            'name_country' => Country::where('id',e($request->country))->first()->name_ar,
            'id_city' => e($request->city),
            'name_city' => City::where('id',e($request->city))->first()->name_ar,
            'hidephone' => e($request->hidephone),
        ];
        if($request->password != '' && $request->password != null){
            $DATA_TO_UPDATE = array_merge(['password' => Hash::make($request->password)],$DATA_TO_UPDATE);
        }
        User::where([
            ['id','=',e(session('user.id'))],
            ['removed','=',0]
        ])->update($DATA_TO_UPDATE);
        session()->put('user.link', Str::slug(e($request->link),'-'));
        session()->put('user.picture', e($request->picture));
        session()->put('user.gender', e($request->gender));
        session()->put('user.name', e($request->name));
        session()->put('user.phone', e($request->phone));
        session()->put('user.birthday', e($request->birthday));
        session()->put('user.id_country', e($request->country));
        session()->put('user.name_country', Country::where('id',e($request->country))->first()->name_ar);
        session()->put('user.id_city', e($request->city));
        session()->put('user.name_city', City::where('id',e($request->city))->first()->name_ar);
        session()->put('user.hidephone', e($request->hidephone));

        session()->put('selector.country.id', e($request->country));
        session()->put('selector.country.name', Country::where('id',e($request->country))->first()->name_ar);
        session()->put('selector.city.id', e($request->city));
        session()->put('selector.city.name', City::where('id',e($request->city))->first()->name_ar);

        return redirect('/account/tabs/account')->with('success',__('تم التعديل بنجاح'));
    }
    public function uploadfilessubmit(Request $request){

        $DATA_TO_APPEND = [];
        if($request->upload_file1 != null){
            $DATA_TO_APPEND = array_merge([
                'type1' => $request->type1,
                'upload_file1' => $request->upload_file1,
            ],$DATA_TO_APPEND);
            if($request->expirationdate1 != null){
                $DATA_TO_APPEND = array_merge([
                    'expirationdate1' => $request->expirationdate1,
                ],$DATA_TO_APPEND);
            }
        }
        if($request->upload_file2 != null){
            $DATA_TO_APPEND = array_merge([
                'type2' => $request->type2,
                'upload_file2' => $request->upload_file2,
            ],$DATA_TO_APPEND);
            if($request->expirationdate2 != null){
                $DATA_TO_APPEND = array_merge([
                    'expirationdate2' => $request->expirationdate2,
                ],$DATA_TO_APPEND);
            }
        }

        if($request->upload_file3 != null){
            $DATA_TO_APPEND = array_merge([
                'type3' => $request->type3,
                'upload_file3' => $request->upload_file3,
            ],$DATA_TO_APPEND);
            if($request->expirationdate3 != null){
                $DATA_TO_APPEND = array_merge([
                    'expirationdate3' => $request->expirationdate3,
                ],$DATA_TO_APPEND);
            }
        }

        if($request->upload_file4 != null){
            $DATA_TO_APPEND = array_merge([
                'type4' => $request->type4,
                'upload_file4' => $request->upload_file4,
            ],$DATA_TO_APPEND);
            if($request->expirationdate4 != null){
                $DATA_TO_APPEND = array_merge([
                    'expirationdate4' => $request->expirationdate4,
                ],$DATA_TO_APPEND);
            }
        }

        if($request->upload_file5 != null){
            $DATA_TO_APPEND = array_merge([
                'type5' => $request->type5,
                'upload_file5' => $request->upload_file5,
            ],$DATA_TO_APPEND);
            if($request->expirationdate5 != null){
                $DATA_TO_APPEND = array_merge([
                    'expirationdate5' => $request->expirationdate5,
                ],$DATA_TO_APPEND);
            }
        }
        $DATA_TO_APPEND = array_merge([
            'id_owner' => e(session('user.id')),
        ],$DATA_TO_APPEND);

        $UploadFileQuery = UploadFile::where([
            ['id_owner','=', e(session('user.id'))],
            ['removed','=',0]
        ]);
        if($UploadFileQuery->count() >0){
            $UploadFileQuery->update($DATA_TO_APPEND);
        }else{
            UploadFile::insert($DATA_TO_APPEND);
        }
        return redirect(route('account'))->with('success', __('تم الحفظ بنجاح'));
    }
    public static function uploadfiles(Request $request){
        $FN = $request->fn_id;
        $request->validate([
            $FN => 'max:10000',
        ]);
        if ($request->hasFile($FN)) {
            $files = $request->file($FN);
            foreach($files as $k=>$file):
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $fileName = rand(0,9999).'-'.sha1(date('Y-m-d H:i:s')).'.'.sha1($filename).'.'.$extension;
                $destinationPath = public_path('/uploads/files/');
                $file->move($destinationPath, $fileName);
                $picturesurl[$k] = '/uploads/files/'.$fileName;
            endforeach;
            $Field = "";
            foreach($picturesurl as $Fields):
                $Field .="<input type='hidden' name='upload_$FN' value='$Fields' />";
            endforeach;
            return $Field;

        }else{
            return null;
        }
    }


    public function showads(Request $request) {
        return view('pages.account.ads.myads',[
            'AdsCount' => Ad::where([
                ['id_owner','=', e(session('user.id'))],
                ['removed','=',0]
            ])->count(),
            'Ads' => Ad::where([
                ['id_owner','=', e(session('user.id'))],
                ['removed','=',0]
            ])->get(),
        ]);
    }
    public function showsearchlikedads(Request $request) {
        return view('pages.account.ads.likedsearch',[
            'SearchCount' => Search::where([
                ['id_owner','=', e(session('user.id'))],
                ['liked','=',1],
                ['removed','=',0]
            ])->count(),
            'Search' => Search::where([
                ['id_owner','=', e(session('user.id'))],
                ['liked','=',1],
                ['removed','=',0]
            ])->get(),
        ]);
    }
    public function showsearchhistoryads(Request $request) {
        return view('pages.account.ads.search',[
            'SearchCount' => Search::where([
                ['id_owner','=', e(session('user.id'))],
                ['removed','=',0]
            ])->count(),
            'Search' => Search::where([
                ['id_owner','=', e(session('user.id'))],
                ['removed','=',0]
            ])->get(),
        ]);
    }
    public function showdraftads(Request $request) {
        return view('pages.account.ads.draft',[
            'AdsCount' => Ad::where([
                ['id_owner','=', e(session('user.id'))],
                ['status','=', 0],
                ['removed','=',0]
            ])->count(),
            'Ads' => Ad::where([
                ['id_owner','=', e(session('user.id'))],
                ['status','=', 0],
                ['removed','=',0]
            ])->get(),
        ]);
    }
    public function showjobads(Request $request) {
        return view('pages.account.ads.job',[
            'AdsCount' => Ad::where([
                ['id_owner','=', e(session('user.id'))],
                ['id_category','=', 7],
                ['id_subcategory','=', 49],
                ['removed','=',0]
            ])->count(),
            'Ads' => Ad::where([
                ['id_owner','=', e(session('user.id'))],
                ['id_category','=', 7],
                ['id_subcategory','=', 49],
                ['removed','=',0]
            ])->get(),
        ]);
    }
    public function showlikesads(Request $request) {
        return view('pages.account.ads.likes',[
            'AdsCount' => Like::where([
                ['id_from','=', e(session('user.id'))],
                ['removed','=',0]
            ])->count(),
            'Ads' => Like::where([
                ['id_from','=', e(session('user.id'))],
                ['removed','=',0]
            ])->get(),
        ]);
    }
    public function showlikersads(Request $request) {
        $LikesCount = Like::where([
            ['id_from','=', e(session('user.id'))],
            ['removed','=',0]
        ])->count();
        if($LikesCount>0){
            $LikeList = Like::where([
                ['id_from','=', e(session('user.id'))],
                ['removed','=',0]
            ])->get();
            foreach($LikeList as $Likes):
                $AdsCount = Ad::where([
                    ['id','=',e($Likes->id_ads)],
                    ['removed','=',0]
                ])->count();
                $Ads = Ad::where([
                    ['id','=',e($Likes->id_ads)],
                    ['removed','=',0]
                ])->get();
            endforeach;
        }else{
            $AdsCount = 0;
            $Ads = [];
        }
        return view('pages.account.ads.likers',[
            'AdsCount' => $AdsCount,
            'Ads' => $Ads,
        ]);
    }
    public function showseenads(Request $request) {
        $SeenQuery = SeenAd::where([
            ['id_user','=', e(session('user.id'))],
        ]);
        if($SeenQuery->count() > 0) {
            foreach($SeenQuery->get() as $Seen):
                $AdsCount = Ad::where([
                    ['id','=',e($Seen->id_ads)],
                ])->count();
                $Ads = Ad::where([
                    ['id','=',e($Seen->id_ads)],
                ])->get();
            endforeach;
        }else{
            $AdsCount = 0;
            $Ads = [];
        }
        return view('pages.account.ads.seen',[
            'AdsCount' => $AdsCount,
            'Ads' => $Ads,
        ]);
    }
    public static function adstatus($status = null) {
        return Ad::where([
            ['id_owner','=', e(session('user.id'))],
            ['status','=', e($status)],
            ['removed','=',0]
        ])->count();
    }
    public static function getPlans(){
        return Plan::where([
            ['valide','=',1],
            ['removed','=',0]
        ])->get();
    }


/**********COUNTS***************************************************** */
    public static function countlikedsearch() {
        return Search::where([
            ['id_owner','=', e(session('user.id'))],
            ['liked','=',1],
            ['removed','=',0]
        ])->count();
    }
    public static function countsearch() {
        return Search::where([
            ['id_owner','=', e(session('user.id'))],
            ['removed','=',0]
        ])->count();
    }

    public static function countjobads() {
        return Ad::where([
            ['id_owner','=', e(session('user.id'))],
            ['id_category','=', 7],
            ['id_subcategory','=', 49],
            ['removed','=',0]
        ])->count();
    }

    public static function countseenads() {
        $SeenQuery = SeenAd::where([
            ['id_user','=', e(session('user.id'))],
        ]);
        $SeenAdsCount = 0;
        if($SeenQuery->count() > 0) {
            foreach($SeenQuery->get() as $Seen):
                $Ads = Ad::where([
                    ['id','=',e($Seen->id_ads)],
                ])->get();
                foreach($Ads as $Ad):
                    $SeenAdsCount += $Ad->times;
                endforeach;
            endforeach;
        }
        return $SeenAdsCount;
    }

    public static function countallads() {
        return Ad::where([
            ['id_owner','=', e(session('user.id'))],
            ['removed','=',0]
        ])->count();
    }
    public static function countactiveads() {
        return Ad::where([
            ['id_owner','=', e(session('user.id'))],
            ['status','>',0],
            ['valide','=',1],
            ['removed','=',0]
        ])->count();
    }


    public static function countLikers(){
        return Like::where([
            ['id_to','=', e(session('user.id'))],
            ['removed','=',0]
        ])->count();
    }
    public static function countLikes(){
        return Like::where([
            ['id_from','=', e(session('user.id'))],
            ['removed','=',0]
        ])->count();
    }

    public static function countsolduser(){
        if(User::where([
            ['id','=', e(session('user.id'))],
            ['removed','=',0]
        ])->first()->sold == null){
            $solde = 0;
        }else{
            $solde = User::where([
                ['id','=', e(session('user.id'))],
                ['removed','=',0]
            ])->first()->sold;
        }
        return $solde;
    }

    public static function countspecialuser(){
        return User::where([
            ['id','=', e(session('user.id'))],
            ['removed','=',0]
        ])->first()->special_user;
    }
    public static function countseenuser(){
        if(User::where([
            ['id','=', e(session('user.id'))],
            ['removed','=',0]
        ])->first()->seen == null){
            $seen = 0;
        }else{
            $seen = User::where([
                ['id','=', e(session('user.id'))],
                ['removed','=',0]
            ])->first()->seen;
        }
        return $seen;
    }
    public static function countseencv(){
        if(User::where([
            ['id','=', e(session('user.id'))],
            ['removed','=',0]
        ])->first()->cv_seen == null){
            $cv_seen = 0;
        }else{
            $cv_seen = User::where([
                ['id','=', e(session('user.id'))],
                ['removed','=',0]
            ])->first()->cv_seen;
        }
        return $cv_seen;
    }

    public function cvsubmit(Request $request){
        $UserQuery = User::where([
            ['id','=', e(session('user.id'))],
            ['removed','=',0]
        ]);
        if($UserQuery->count() > 0){
            if($request->cv_competences != null):
                $competencestoinsert = e(implode(',',$request->cv_competences));
            else:
                $competencestoinsert = '';
            endif;
            if($request->cv_languages != null):
                $languagestoinsert = e(implode(',',$request->cv_languages));
            else:
                $languagestoinsert = '';
            endif;
            $UserQuery->update([
                'id_country' => e($request->country),
                'name_country' => Country::where('id',e($request->country))->first()->name_ar,
                'id_city' => e($request->city),
                'name_city' => City::where('id',e($request->city))->first()->name_ar,
                'cv_category' => e($request->cv_category),
                'cv_exprience' => e($request->cv_exprience),
                'cv_car' => e($request->cv_car),
                'cv_permis' => e($request->cv_permis),
                'cv_diplome' => e($request->cv_diplome),
                'cv_married' => e($request->cv_married),
                'cv_info' => e($request->cv_info),
                'cv_competences' => $competencestoinsert,
                'cv_adress' => e($request->cv_adress),
                'cv_languages' => $languagestoinsert,
                'cv_type' => e($request->cv_type),
                'cv_salaire' => e($request->cv_salaire),
            ]);
            return redirect('/account/cv')->with('success',__('تم التعديل بنجاح'));
        }else{
            abort('404');
        }
    }
}
