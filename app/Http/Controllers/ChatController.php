<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\PrivateMessage;
use App\Models\Ad;
use App\Models\User;
use App\Models\Automessage;
use App\Events\ChatEvent;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    

    public function chatcount(Request $request){
        if(session('user.id') != null):
            $ConversationQuery = PrivateMessage::where([
                'id_to' => e(session('user.id')),
                'vu' => 0,
            ]);
            return $ConversationQuery->count();
        else:
            return 0;
        endif;
    }

    public function chatnew(Request $request){
        if($request->id_to != e(session('user.id'))){
            if($request->id_to != null){
                if($request->message !=null && $request->message != ""){
                    PrivateMessage::create([
                        'id_from' => e(session('user.id')),
                        'name_from' => e(session('user.name')),
                        'email_from' => e(session('user.email')),
                        'phone_from' => e(session('user.phone')),

                        'id_to' => e($request->id_to),
                        'name_to' => User::where('id',e($request->id_to))->get()->first()->name,
                        'phone_to' => User::where('id',e($request->id_to))->get()->first()->phone,
                        'email_to' => User::where('id',e($request->id_to))->get()->first()->email,

                        'message' => e($request->message),
                        'vu' => 0,
                    ]);
                    return redirect()->back()->with('success','تم إرسال الرسالة بنجاح');
                }else{
                    return redirect()->back()->with('error','لا يمكن أن ترسل رسالة فارغة');
                }
            }else{
                return redirect()->back()->with('error','لم نتمكن من معرفة العضو الذي تريد الدردشة معه');
            }
        }else{
            return redirect()->back()->with('error','لا يمكنك إرسال رسالة لنفسك');
        }
    }

    public function chatsendautomessage(Request $request){
        if($request->id_ads != null && e(session('user.id')) != null && $request->id_automessage != null){
            $AutoMessage = Automessage::where('id',e($request->id_automessage));
            if($AutoMessage->count()>0){
                $request->message = e($AutoMessage->get()->first()->message_1);
            }else{
                $request->message = e($request->id_automessage);
            }
            $AdsUser = Ad::where('id',e($request->id_ads));
            if($AdsUser->count()>0 && $AdsUser->get()->first()->id_owner != session('user.id')){
                $request->id_to = $AdsUser->get()->first()->id_owner;
                PrivateMessage::create([ 
                    'id_from' => e(session('user.id')),
                    'name_from' => e(session('user.name')),
                    'email_from' => e(session('user.email')),
                    'phone_from' => e(session('user.phone')),
    
                    'id_to' => e($request->id_to),
                    'name_to' => User::where('id',e($request->id_to))->get()->first()->name,
                    'phone_to' => User::where('id',e($request->id_to))->get()->first()->phone,
                    'email_to' => User::where('id',e($request->id_to))->get()->first()->email,
    
                    'message' => e($request->message),
                    'vu' => 0,
                ]);
                return redirect()->back()->with('success','تم إرسال الرسالة بنجاح');
            }
            return redirect()->back()->with('error','لا يمكن إرسال الرسالة');
        }else{
            return redirect()->back()->with('error','لا يمكن إرسال الرسالة');
        }
    }



    public function chatsubmit(Request $request){
        if($request->id_from != null && $request->id_from == e(session('user.id'))){
            if($request->id_to != null){
                if($request->message !=null && $request->message != ""){
                    PrivateMessage::create([
                        'id_from' => e(session('user.id')),
                        'name_from' => e(session('user.name')),
                        'email_from' => e(session('user.email')),
                        'phone_from' => e(session('user.phone')),

                        'id_to' => e($request->id_to),
                        'name_to' => User::where('id',e($request->id_to))->get()->first()->name,
                        'phone_to' => User::where('id',e($request->id_to))->get()->first()->phone,
                        'email_to' => User::where('id',e($request->id_to))->get()->first()->email,

                        'message' => e($request->message),
                        'vu' => 0,
                    ]);
                    return ['error' => false,'response' => e($request->message)];
                }else{
                    return [
                        'error' => true,
                        'response' => 'لم نتمكن من معرفة العضو الذي تريد الدردشة معه'
                    ];
                }
            }else{
                return [
                    'error' => true,
                    'response' => 'لم نتمكن من معرفة العضو الذي تريد الدردشة معه'
                ];
            }
        }else{
            return [
                'error' => true,
                'response' => 'ليس لديك الحق في إرسال الرسالة'
            ];
        }
    }

    public function chatrefresh(Request $request){
        $UserQuery =  User::where([
          ['removed','=',0]
        ]);
        $USERS_CONVERSATIONS = [];
        if($UserQuery->count() > 0){
            foreach($UserQuery->get() as $User):
                if($User->picture != null){
                    $Picture = e($User->picture);
                }else{
                    $Picture = '/uploads/categories/no_profile.png';
                }
                $ConversationQuery = PrivateMessage::where([
                    ['id_to','=', e(session('user.id'))],
                    ['removed','=',0]
                ])->orWhere([
                    ['id_from','=', e(session('user.id'))],
                    ['removed','=',0]
                ]);
                $ConversationStr ='';
                if($ConversationQuery){
                    foreach($ConversationQuery->get() as $Conversation):
                        PrivateMessage::where('id',e($Conversation->id))->update(['vu' => 1]);
                        if($Conversation->id_from == e(session('user.id'))):
                            $SenderOrReplayer = 'sender';
                        endif;
                        if($Conversation->id_to == e(session('user.id'))):
                            $SenderOrReplayer = 'bg-dark';
                        endif;
                        $ConversationStr .='<li class="'.$SenderOrReplayer.'"><p>'.e($Conversation->message).'</p><span class="time">'.date('d/m/Y H:i',strtotime($Conversation->created_at)).'</span></li>';
                    endforeach;
                }
                $USERS_CONVERSATIONS = array_merge([
                    'id' => e($request->id),
                    'picture' => $Picture,
                    'name' => e($User->name),
                    'phone' => e($User->phone),
                    'conversation' => $ConversationStr,
                ],$USERS_CONVERSATIONS);
            endforeach;
        }
        return $USERS_CONVERSATIONS;
      }

    public function userinfo(Request $request){
      $UserQuery =  User::where([
        ['id','=',e($request->id)],
        ['removed','=',0]
      ]);
      if($UserQuery->count() > 0){
        Session::put('chat.user.actif',e($request->id));
        session('chat.user.actif',e($request->id));
        $request->session('chat.user.actif',e($request->id));
        $request->session()->put('chat.user.actif',e($request->id));

        $User = $UserQuery->get()->first();
            if($User->picture != null){
                $Picture = e($User->picture);
            }else{
                $Picture = '/uploads/categories/no_profile.png';
            }
           $ConversationQuery = PrivateMessage::where([
                ['id_from','=', $request->id],
                ['id_to','=', e(session('user.id'))],
                ['removed','=',0]
           ])->orWhere([
                ['id_to','=', $request->id],
                ['id_from','=', e(session('user.id'))],
                ['removed','=',0]
           ]);
           PrivateMessage::where('id',e($request->id))->update(['vu' => 1]);
           $ConversationStr ='';
           if($ConversationQuery){
                foreach($ConversationQuery->get() as $Conversation):
                    if($Conversation->id_from == e(session('user.id'))):
                        $SenderOrReplayer = 'sender';
                    else:
                        $SenderOrReplayer = 'repaly';
                    endif;
                    $ConversationStr .='<li class="'.$SenderOrReplayer.'"><p>'.e($Conversation->message).'</p><span class="time">'.date('d/m/Y H:i',strtotime($Conversation->created_at)).'</span></li>';
                endforeach;
            }
            return [
                'picture' => $Picture,
                'name' => e($User->name),
                'phone' => e($User->phone),
                'conversation' => $ConversationStr,
                'actif' => Session::get('chat.user.actif'),
            ];
        }else{
            Session::put('chat.user.actif',0);
            session('chat.user.actif',0);
            $request->session('chat.user.actif',0);
            $request->session()->put('chat.user.actif',0);

            return [
                'picture' => '/uploads/categories/no_profile.png',
                'name' => '',
                'phone' => '',
                'conversation' => '',
                'actif' => 0,
            ];
        }
    }

    public function index(){
        $user_id = User::where([
           /* ['id', '!=' , session('user.id') ],*/
            ['removed', '=' ,0]
        ])->get();
        $users = User::where([
            ['removed', '=' ,0]
        ])->get();
        return view('pages.chat.index',compact('users','user_id'));
    }

    public function chat($id){
       $user =  User::find($id);
       if($user){
        if($user->removed == 0){
            return view('pages.chat.chat',compact('id'));
        }else{
            abort(404);

        }
       }else{
            abort(404);
        }
    }

    public function chatasklowprice(Request $request){
        if(e(session('user.id')) != null){
            if($request->id_ads != null){
                $AdsQuery = Ad::where('id',e($request->id_ads));
                if($AdsQuery->count()>0){
                    $ID_USER = $AdsQuery->get()->first()->id_owner;
                    PrivateMessage::create([
                        'id_from' => e(session('user.id')),
                        'name_from' => e(session('user.name')),
                        'email_from' => e(session('user.email')),
                        'phone_from' => e(session('user.phone')),

                        'id_to' => e($ID_USER),
                        'name_to' => User::where('id',e($ID_USER))->get()->first()->name,
                        'phone_to' => User::where('id',e($ID_USER))->get()->first()->phone,
                        'email_to' => User::where('id',e($ID_USER))->get()->first()->email,

                        'message' => 'أخبرني عندما يقل السعر',
                        'vu' => 0,
                    ]);
                    return redirect()->back()->with('success','تم إرسال طلب ب أخبرني عندما يقل السعر بنجاح');
                }else{
                    return redirect()->back()->with('error','لم نتمكن من معرفة العضو الذي تريد الدردشة معه');
                }
            }else{
                return redirect()->back()->with('error','لم نتمكن من معرفة العضو الذي تريد الدردشة معه');
            }
        }else{
            return redirect()->back()->with('error','ليس لديك الحق في إرسال الرسالة');
        }
    }


}

