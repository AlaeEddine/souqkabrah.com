<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUser;

class NotificationController extends Controller
{
    public function notificationcount(Request $request){
        if(session('user.id') != null):
            $ConversationQuery = ContactUser::where([
                'id_user' => e(session('user.id')),
                'vu' => 0,
            ]);
            return $ConversationQuery->count();
        else:
            return 0;
        endif;
    }
    public function notifications(Request $request) {
        $ContactUserQuery = ContactUser::where([
            ['id_user','=', e(session('user.id'))],
            ['removed','=',0]
        ]);
        if($ContactUserQuery->count()>0):
            $ContactUserQuery->update(['vu' =>'1']);
        endif;

        return view('pages.account.notifications.notifications',[
            'NotificationsCount' => $ContactUserQuery->count(),
            'Notifications' => $ContactUserQuery->get(),
        ]);
    }
}
