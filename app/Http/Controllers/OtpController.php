<?php

namespace App\Http\Controllers;
use SadiqSalau\LaravelOtp\Facades\Otp;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Mail\OtpMail;
use Illuminate\Auth\Events\Registered;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Twilio\Rest\Client; // make sure to import the Twilio client



class OtpController extends Controller
{

    public function otpfirebasecreateaccount(Request $request){
        session('user.otp',e($request->code));
        session()->put('user.otp',e($request->code));
        $email_enabled = 0;
        $phone_enabled = 1;
        $request->what = "phone";

        $UserQuery = User::where([
            ['email','=',e($request->email)],
            ['removed','=',0],
        ])->orWhere([
            ['phone','=',e($request->phone)],
            ['removed','=',0],
        ]);
        if($UserQuery->count() > 0){
            if( $request->what == 'email'){
                $UserQuery->update([
                    'email_enabled'     =>      $email_enabled,
                    'email_code'        =>      session('user.otp'),
                ]);
                session()->put('user.email_enabled', e($UserQuery->first()->email_enabled));
            }
            if($request->what == null || $request->what == 'phone'){
                $UserQuery->update([
                    'phone_enabled'     =>      $phone_enabled,
                    'phone_code'        =>      session('user.otp'),
                ]);
                session()->put('user.phone_enabled', e($UserQuery->first()->phone_enabled));
            }
                session()->put('user.link', e($UserQuery->first()->link));
                session()->put('user.id', e($UserQuery->first()->id));
                session()->put('user.picture', e($UserQuery->first()->picture));
                session()->put('user.name', e($UserQuery->first()->name));
                session()->put('user.email', e($UserQuery->first()->email));
                session()->put('user.id_country', e(session('selector.country.id')));
                session()->put('user.phone', e($UserQuery->first()->phone));
                session()->put('user.email_enabled', e($UserQuery->first()->email_enabled));
                session()->put('user.phone_enabled', e($UserQuery->first()->phone_enabled));
                session()->put('user.adress', e($UserQuery->first()->adress));
                session()->put('user.created_at', e($UserQuery->first()->created_at));
            Auth::login($UserQuery->first());

            return redirect(route('account.tabs',['account']))->with('success', __('تم التعديل بنجاح'));
        }else{
      
            if($request->what == 'email'){
                
                $user = User::create([
                    'email_code'        =>      session('user.otp'),
                    'email_enabled'     =>      $email_enabled,
                    'link'              =>      null,
                    'name'              =>      session('user.email'),
                    'email'             =>      session('user.email'),
                    'id_country'        =>      e(session('selector.country.id')),
                    'phone'             =>      null,
                    'level'             =>      1,
                    'password'          =>      Hash::make(session('user.phone')),
                    'removed'           =>      0,
                    'email_verified_at' =>      now(),
                ]);
            }
            if($request->what == null || $request->what == 'phone'){
                $user = User::create([
                    'phone_code'        =>      session('user.otp'),
                    'id_country'        =>      e(session('selector.country.id')),
                    'phone_enabled'     =>      $phone_enabled,
                    'link'              =>      null,
                    'name'              =>      session('user.phone'),
                    'email'             =>      session('user.phone'),
                    'phone'             =>      session('user.phone'),
                    'level'             =>      1,
                    'password'          =>      Hash::make(session('user.phone')),
                    'removed'           =>      0,
                    'removed'           =>      0,
                    'email_verified_at' =>      now(),
                ]);
            }
            $UserQuery = User::where([
                ['id','=',e($user->id)],
                ['removed','=',0]
            ]);
            session('user.id',$user->id);
            Session::put('user.id',$user->id);
            session()->put('user.id',$user->id);
            return redirect(route('register.user.continue',[$request->what,$user->id]));
        }
    }

    public function otpfirebase(Request $request){
         return view('pages.otp.firebase', [
         ]);
     }
 
    public function otpshow(Request $request){
       /* if(session('user.otp') == null){
            session()->put('user.otp', null);
            $OTP_CODE = rand(111111,999999);
            session()->put('user.otp', e($OTP_CODE));    
        }else{
            $OTP_CODE = session('user.otp');
        }
        if($this->sendsms($request,$OTP_CODE)):     
            return view('pages.otp.validation', [
                'what' => $request->what,
            ]);
        else:
            abort('404');
        endif;*/
        return view('pages.otp.validation', [
            'what' => $request->what,
        ]);
    }

    public function autovalidation(Request $request){
        $code = e($request->otp);
        if($code != session('user.otp')){
            return redirect(route('otp.validation',[$request->what]))->with('error',__('الكود الذي أدخلت غير صحيح'));
        }else{
            $user = User::create([
                'otp'               =>      session('user.otp'),
                'link'              =>      session('user.link'),
                'id_country'        =>      e(session('selector.country.id')),
                'name'              =>      session('user.name'),
                'email'             =>      session('user.email'),
                'phone'             =>      session('user.phone'),
                'level'             =>      session('user.level'),
                'password'          =>      Hash::make(session('user.password')),
                'removed'           =>      0,
                'email_verified_at' =>      now(),
            ]);
            $UserQuery = User::where([
                ['id','=',e($user->id)],
                ['removed','=',0]
            ]);
            session()->put('user.link', e($UserQuery->first()->link));
            session()->put('user.id', e($UserQuery->first()->id));
            session()->put('user.picture', e($UserQuery->first()->picture));
            session()->put('user.name', e($UserQuery->first()->name));
            session()->put('user.email', e($UserQuery->first()->email));
            session()->put('user.phone', e($UserQuery->first()->phone));
            session()->put('user.adress', e($UserQuery->first()->adress));
            session()->put('user.created_at', e($UserQuery->first()->created_at));

            event(new Registered($user));

            Auth::login($user);

            return redirect(route('account'));
        }
    }

    public function otpverification (Request $request) {
        $code = $request->code1.$request->code2.$request->code3.$request->code4.$request->code5.$request->code6;
        if($request->what == 'phone'){
            $email_enabled = 0;
            $phone_enabled = 1;

            $request->validate([
                'phone'    => ['required', 'string', 'max:255'],
                'code1'=> ['required','numeric'],
                'code2'=> ['required','numeric'],
                'code3'=> ['required','numeric'],
                'code4'=> ['required','numeric'],
                'code5'=> ['required','numeric'],
                'code6'=> ['required','numeric'],
            ]);
            //    $otp = Otp::identifier($request->phone)->attempt($code);
        }else{
            $request->what = 'email';
            $email_enabled = 1;
            $phone_enabled = 0;
            $request->validate([
                'email'    => ['required', 'string', 'email', 'max:255'],
                'code1'=> ['required','numeric'],
                'code2'=> ['required','numeric'],
                'code3'=> ['required','numeric'],
                'code4'=> ['required','numeric'],
                'code5'=> ['required','numeric'],
                'code6'=> ['required','numeric'],
            ]);
            //$otp = Otp::identifier($request->email)->attempt($code);
        }
        if($code != session('user.otp')){
            return redirect(route('otp.validation',[$request->what]))->with('error',__('الكود الذي أدخلت غير صحيح'));
        }else{
            // complete register
            $UserQuery = User::where([
                ['email','=',e($request->email)],
                ['removed','=',0],
            ])->orWhere([
                ['phone','=',e($request->phone)],
                ['removed','=',0],
            ]);
            if($UserQuery->count() > 0){
                if($request->what == null || $request->what == 'email'){
                    $UserQuery->update([
                        'email_enabled'     =>      $email_enabled,
                        'email_code'        =>      session('user.otp'),
                    ]);
                    session()->put('user.email_enabled', e($UserQuery->first()->email_enabled));
                }
                if($request->what == 'phone'){
                    $UserQuery->update([
                        'phone_enabled'     =>      $phone_enabled,
                        'phone_code'        =>      session('user.otp'),
                    ]);
                    session()->put('user.phone_enabled', e($UserQuery->first()->phone_enabled));
                }
                    session()->put('user.link', e($UserQuery->first()->link));
                    session()->put('user.id', e($UserQuery->first()->id));
                    session()->put('user.picture', e($UserQuery->first()->picture));
                    session()->put('user.name', e($UserQuery->first()->name));
                    session()->put('user.email', e($UserQuery->first()->email));
                    session()->put('user.id_country', e(session('selector.country.id')));
                    session()->put('user.phone', e($UserQuery->first()->phone));
                    session()->put('user.email_enabled', e($UserQuery->first()->email_enabled));
                    session()->put('user.phone_enabled', e($UserQuery->first()->phone_enabled));
                    session()->put('user.adress', e($UserQuery->first()->adress));
                    session()->put('user.created_at', e($UserQuery->first()->created_at));
                Auth::login($UserQuery->first());

                return redirect(route('account.tabs',['account']))->with('success', __('تم التعديل بنجاح'));
            }else{
          
                if($request->what == null || $request->what == 'email'){
                    
                    $user = User::create([
                        'email_code'        =>      session('user.otp'),
                        'email_enabled'     =>      $email_enabled,
                        'link'              =>      null,
                        'name'              =>      session('user.email'),
                        'email'             =>      session('user.email'),
                        'id_country'        =>      e(session('selector.country.id')),
                        'phone'             =>      null,
                        'level'             =>      1,
                        'password'          =>      Hash::make(session('user.phone')),
                        'removed'           =>      0,
                        'email_verified_at' =>      now(),
                    ]);
                }
                if($request->what == 'phone'){
                    $user = User::create([
                        'phone_code'        =>      session('user.otp'),
                        'id_country'        =>      e(session('selector.country.id')),
                        'phone_enabled'     =>      $phone_enabled,
                        'link'              =>      null,
                        'name'              =>      session('user.phone'),
                        'email'             =>      session('user.phone'),
                        'phone'             =>      session('user.phone'),
                        'level'             =>      1,
                        'password'          =>      Hash::make(session('user.phone')),
                        'removed'           =>      0,
                        'removed'           =>      0,
                        'email_verified_at' =>      now(),
                    ]);
                }
                $UserQuery = User::where([
                    ['id','=',e($user->id)],
                    ['removed','=',0]
                ]);
                session('user.id',$user->id);
                Session::put('user.id',$user->id);
                session()->put('user.id',$user->id);
                return redirect(route('register.user.continue',[$request->what,$user->id]));

                 /* session()->put('user.link', e($UserQuery->first()->link));
                session()->put('user.id', e($UserQuery->first()->id));
                session()->put('user.picture', e($UserQuery->first()->picture));
                session()->put('user.name', e($UserQuery->first()->name));
                session()->put('user.email', e($UserQuery->first()->email));
                session()->put('user.id_country', e(session('selector.country.id')));
                session()->put('user.phone', e($UserQuery->first()->phone));
                session()->put('user.email_enabled', e($UserQuery->first()->email_enabled));
                session()->put('user.phone_enabled', e($UserQuery->first()->phone_enabled));
                session()->put('user.adress', e($UserQuery->first()->adress));
                session()->put('user.created_at', e($UserQuery->first()->created_at));

                  event(new Registered($user));

                    Auth::login($user);

                    return redirect(route('account'));*/
            }
        }
    }
    public function otpresend (Request $request) {
        session()->put('user.otp', null);
        $OTP_CODE = rand(111111,999999);
        session()->put('user.otp', e($OTP_CODE));
        if($request->what == 'email' || $request->what == 'null'){
            Mail::to(session('user.email'))->send(new OtpMail($OTP_CODE));
            return redirect(route('otp.validation',[$request->what]))->with('success',__('تم إرسال الكود من جديد'));
        }
        if($request->what == 'phone'){
            if(session('user.token') != null){
                if($this->sendsms($request,$OTP_CODE)){
                    return redirect(route('otp.validation',[$request->what]))->with('success',__('تم إرسال الكود من جديد'));
                }else{
                    return redirect(route('otp.validation',[$request->what]))->with('error',$this->sendsms($request,$OTP_CODE));
                }
            }else{
                return redirect(route('otp.validation',[$request->what]))->with('error','لم نتمكن من إرسال الإشعار المرجو التأكد أنك قمت بتفعيل الإشعارات في متصفحك');
            }
        }

    }
    public function otpsend (Request $request) {
        session()->put('user.otp', null);
        $OTP_CODE = rand(111111,999999);
        session()->put('user.otp', e($OTP_CODE));
        
        session()->put('user.phone', e($request->nd));
        session('user.phone', e($request->nd));
        Session::put('user.phone', e($request->nd));

        if($request->what == 'email' || $request->what == 'null'){
            Mail::to(session('user.email'))->send(new OtpMail($OTP_CODE));
            return redirect(route('otp.validation',[$request->what]))->with('success',__('تم إرسال الكود'));
        }
        if($request->what == 'phone'){
            if(session('user.token') != null){
                if($this->sendsms($request,$OTP_CODE)){
                    return redirect(route('otp.validation',[$request->what]))->with('success',__('تم إرسال الكود'));
                }else{
                    return redirect(route('otp.validation',[$request->what]))->with('error','لم نتمكن من إرسال الإشعار المرجو التأكد أنك قمت بتفعيل الإشعارات في متصفحك');
                }
            }else{
                return redirect(route('otp.validation',[$request->what]))->with('error','لم نتمكن من إرسال الإشعار المرجو التأكد أنك قمت بتفعيل الإشعارات في متصفحك');
            }
        }

    }

    
    private function sendsms(Request $request,$code){
        $receiverNumber = e($request->nd); // Replace with the recipient's phone number
        $message = "كود OTP الخاص بكم هو : $code"; // Replace with your desired message
        session()->put('user.otpmsg', e($message));
        session('user.otpmsg', e($message));
        Session::put('user.otpmsg', e($message));
        FirebaseController::sendNotification($request,$message);
        //FirebaseController::sendOtpViaFcm();        

       /*try {
            $client = new Client($sid, $token);
            $client->messages->create($receiverNumber, [
                'from' => $fromNumber,
                'body' => $message
            ]); 

            return true;
        } catch (Exception $e) {
            return 'Error: ' . $e->getMessage();
        }  */
        return true; 
    }
}

