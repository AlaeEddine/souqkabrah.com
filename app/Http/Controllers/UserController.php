<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\User;
use App\Models\Ad;
use App\Models\BannerAd;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Support\Str;
use Twilio\Rest\Client; // make sure to import the Twilio client



class UserController extends Controller{

public function login(Request $request){
    $Setting = Setting::where('id',1)->first();
       /* if($Setting->recaptcha == 1 && $Setting->recaptchasitekey != null && $Setting->recaptchasecretkey != null):
            $request->validate([
                'phone' => ['required'],
                'password' => ['required'],
                'g-recaptcha-response' => ['required', new ReCaptcha]
            ]);
        else:

        endif;*/

        $request->validate([
            'phone' => ['required'],
            'password' => ['required'],
        ]);
        $UserQuery = User::where([
            ['phone','=',e($request->phone)],
            ['removed','=',0],
        ]);

        if($UserQuery->count() > 0){
            $UserData = $UserQuery;
            session()->put('user.id', e($UserData->first()->id));
            session()->put('user.link', e($UserData->first()->link));
            session()->put('user.picture', e($UserData->first()->picture));
            session()->put('user.gender', e($UserData->first()->gender));
            session()->put('user.name', e($UserData->first()->name));
            session()->put('user.email', e($UserData->first()->email));
            session()->put('user.phone', e($UserData->first()->phone));
            session()->put('user.birthday', e($UserData->first()->birthday));
            session()->put('user.id_country', e($UserData->first()->id_country));
            session()->put('user.name_country', e($UserData->first()->name_country));
            session()->put('user.id_city', e($UserData->first()->id_city));
            session()->put('user.name_city', e($UserData->first()->name_city));
            session()->put('selector.country.id', e($UserData->first()->id_country));
            session()->put('selector.country.name', e($UserData->first()->name_country));
            session()->put('selector.city.id', e($UserData->first()->id_city));
            session()->put('selector.city.name', e($UserData->first()->name_city));
            session()->put('user.country.id', e($UserData->first()->id_country));
            session()->put('user.country.name', e($UserData->first()->name_country));
            session()->put('user.city.id', e($UserData->first()->id_city));
            session()->put('user.city.name', e($UserData->first()->name_city));
            session()->put('user.hidephone', e($UserData->first()->hidephone));
            session()->put('user.adress', e($UserData->first()->adress));
            session()->put('user.created_at', e($UserData->first()->created_at));
            if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password, 'removed' => 0])) {
                $request->session()->regenerate();
            }else{
                Auth::guard('web')->logout();
                session()->invalidate();
                session()->regenerateToken();
                return  0;
            }
            if(session('user.phone') == null){
                Auth::guard('web')->logout();
                session()->invalidate();
                session()->regenerateToken();
                return  0;
            }else{
                return 1;
            }
        }else{
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            return  0;

        }
    }

    public static function traitementnd(Request $request){
        $phoneND = e($request->full_nd_format);
        if(strstr($phoneND,' ')){
            $phoneND = str_replace(' ', '', $phoneND);
        }
        if(strstr($phoneND,'-')){
           $phoneND = str_replace('-', '', $phoneND);
        }
        session('user.phone',e($phoneND));
        Session::put('user.phone',e($phoneND));
        session()->put('user.phone',e($phoneND));

        $UserQuery = User::where([
            ['phone','=',e($phoneND)],
            ['banned', '!=',1],
            ['removed','=',0]
        ]);
        if($UserQuery->count() >0){     
            return [
                'nd' => e($phoneND),
                'type' => 'login',
            ];
        }
        return [
            'nd' => e($phoneND),
            'type' => 'register',
        ];
    }
    /*public function check(Request $request){
        $phoneND = UserController::traitementnd($request);
        dd($phoneND);

       $UserQuery = User::where([
        ['phone','=',e($phoneND)],
        ['banned', '!=',1],
        ['removed','=',0]
       ]);
       if($UserQuery->count() >0){     
        return [
            'nd' => e($phoneND),
            'type' => 'login',
        ];
       }
       return [
        'nd' => e($phoneND),
        'type' => 'register',
       ];

    }*/


    public static function generatePictureFromId($id){
        $UserQuery = User::where([
            ['id','=',e($id)],
            ['banned', '=',0],
            ['removed','=',0]
        ]);
        if($UserQuery->count() > 0) {
            if($UserQuery->first()->picture != null){
                return $UserQuery->first()->picture;
            }else{
                return null;
            }
        }else{
            return null;
        }
    }
    public static function generateLinkFromId($id){
        $UserQuery = User::where([
            ['id','=',e($id)],
            ['banned', '=',0],
            ['removed','=',0]
        ]);
        if($UserQuery->count() > 0) {
            if($UserQuery->first()->link != null){
                return Str::slug($UserQuery->first()->link,'-');
            }else{
                return null;
            }
        }else{
            return null;
        }
    }

    public function continueregister(Request $request){
        return view('pages.register.continue');
    }

    public function continueregistersubmit(Request $request){
        if($request->id != null): $request->id = e($request->id); else: $request->id = 0; endif;
        if($request->id == session('user.id')):
            $UserQuery = User::where([
                ['id','=',e($request->id)],
                ['banned', '!=',1],
                ['removed','=',0]    
            ]);
            if($UserQuery->count() > 0){
                $Setting = Setting::where('id',1)->first();

                if($Setting->recaptcha == 1 && $Setting->recaptchasitekey != null && $Setting->recaptchasecretkey != null):
                    $request->validate([
                        'name' => ['required', 'string', 'max:255'],
                        'email' => ['required', Rule::unique('users')->where(['id','!=', session('user.id')])->where(['email','=', $request->email])->where(['removed','=',0])],
                        'password' => ['required', 'confirmed', Rules\Password::defaults()],
                        'g-recaptcha-response' => ['required', new ReCaptcha]
                    ]);
                else:
                    $request->validate([
                        'name' => ['required', 'string', 'max:255'],
                        'email' => ['required', Rule::unique('users')->where('id','!=', session('user.id'))->where('email','=', $request->email)->where('removed','=',0)],
                        'password' => ['required', 'confirmed', Rules\Password::defaults()],
                    ]);
                endif;
                if($request->level == 1 || $request->level == "1"):
                    $request->level = 3;
                elseif($request->level == 2 || $request->level == "2"):
                    $request->level = 4;
                else:
                    $request->level = 0;
                endif;
                $request->link = sha1(md5(e($request->name).e($request->email).e($request->phone).e($request->level).date('Y-m-H:i:s').rand(1,1000000)));
                $UserQuery2 = User::where([
                    ['email','=',e($request->email)]
                ]);
                if($UserQuery2->count() > 0){
                    return redirect()->back()->with('error', __('البريد الإلكتروني مستعمل من قبل'));
                }else{
                    $UserQuery->update([
                        'link'              =>      $request->link,
                        'name'              =>      $request->name,
                        'email'             =>      $request->email,
                        'level'             =>      $request->level,
                        'password'          =>      Hash::make($request->password),
                        'removed'           =>      0,
                        'email_verified_at' =>      now(),
                    ]);
                        session()->put('user.link', e($UserQuery->first()->link));
                        session()->put('user.id', e($UserQuery->first()->id));
                        session()->put('user.picture', e($UserQuery->first()->picture));
                        session()->put('user.name', e($UserQuery->first()->name));
                        session()->put('user.email', e($UserQuery->first()->email));
                        session()->put('user.phone', e($UserQuery->first()->phone));
                        session()->put('user.id_country', e(session('selector.country.id')));
                        session()->put('user.country.id', e(session('selector.country.id')));
                        session()->put('user.adress', e($UserQuery->first()->adress));
                        session()->put('user.created_at', e($UserQuery->first()->created_at));
                        event(new Registered($UserQuery->first()));
        
                        Auth::login($UserQuery->first());
        
                        return redirect(route('account'));
                }
        
            }else{
                return redirect()->back()->with('error',__('ليس لديكم الحق في إتمام العملية'));
            }
        else:
            return redirect()->back()->with('error',__('ليس لديكم الحق في إتمام العملية'));
        endif;
    }

    public static function Categories(){
        return Category::where([ ['removed','=',0] ])->get();
    }
    public static function SubCategories(){
        return SubCategory::where([ ['removed','=',0] ])->get();
    }
    public static function SubSubCategories(){
        return SubSubCategory::where([ ['removed','=',0] ])->get();
    }
    public static function Products(){
        return Product::where([ ['removed','=',0] ])->get();
    }
    public static function Ads(){
        $Setting = Setting::where('id',1)->first();
        $APPEND_CONDITIONS = [
            ['fixed','=',1],
            ['removed','=',0]
        ];
        if($Setting->showadanonymous == 0 || $Setting->showadusers == 0):
            $APPEND_CONDITIONS = array_merge($APPEND_CONDITIONS, [['valide','=',1]]);
        endif;

        if(session('selector.city.id') != null){
            $APPEND_CONDITIONS = array_merge($APPEND_CONDITIONS, [['id_city','=',e(session('selector.city.id'))],['valide','=',1]]);
        }
        if(session('selector.country.id') != null){
            $APPEND_CONDITIONS = array_merge($APPEND_CONDITIONS, [['id_country','=',e(session('selector.country.id'))],['valide','=',1]]);
        }
        return Ad::where($APPEND_CONDITIONS)->get();


    }

    public static function slug($string, $separator = '-') {
        if (is_null($string)) {
            return "";
        }
        $string = trim($string);
        $string = mb_strtolower($string, "UTF-8");;
        $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);
        $string = preg_replace("/[\s-]+/", " ", $string);
        $string = preg_replace("/[\s_]/", $separator, $string);
        return $string;
    }

    public function home(){
        return view('pages.home.index',[
            'Categories' => UserController::Categories(),
            'SubCategories' => UserController::SubCategories(),
            'SubSubCategories' => UserController::SubSubCategories(),
            'Ads' => UserController::Ads(),
            'AdsHome' => AdController::AdsHome(),
            'BannerAds' => BannerAd::where([
                ['home','=',1],
                ['valide','=',1],
                ['removed','=',0],
            ])->get(),
        ]);
    }
}
