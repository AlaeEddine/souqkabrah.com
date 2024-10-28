<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use Kreait\Firebase\Factory;

use Session;

class FirebaseController extends Controller
{
    public function index()
    {
        return view('pages.otp.test');
    }

    public function storeToken(Request $request)
    {
        $token = $request->input('token');
        session('user.token',$token);
        Session::put('user.token',$token);
        $request->session('user.token',$token);
        $request->session()->put('user.token',$token);
        // Enregistrer le token dans la base de données ou autre stockage
        // Exemple:
        // Token::create(['token' => $token]);
        if(session('user.id') !=null):
            User::where('id',e(session('user.id')))->update(['fcm' => $token]);
        endif;
        Log::info('Token FCM enregistré : ' . $token);

        return response()->json(['status' => 'Token stored successfully']);
    }

    public static function sendNotification(Request $request, $msg)
    {
        $deviceToken = session('user.token');
        $title = session('user.phone');
        $body = e($msg);
        $imageUrl = "https://souqkabrah.com/favicon.ico";
    
        if (!$deviceToken) {
            return redirect(route('otp.send', ['phone', e($request->nd)]));
        }
    
        try {
            $messaging = (new Factory)->withServiceAccount(base_path(env('FIREBASE_CREDENTIALS')))->createMessaging();
            // Create a notification with the title, body, and image URL
            $notification = Notification::create($title, $body, $imageUrl);

            // Send a message with both 'notification' and 'data'
            $message = CloudMessage::withTarget('token', $deviceToken)
            ->withData([
                'title' => $title,
                'body' => $body,
                'icon' => $imageUrl,
            ]);
               // ->withNotification($notification)
              //  ->withData(['title' => $title, 'body' => $body, 'icon' => $imageUrl]); // Use 'withData' to send custom data

            //dd($message);
            $messaging->send($message);
    
            Log::info('Notification envoyée avec succès : ' . $msg);
    
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'envoi de la notification : ' . $e->getMessage());
            return response()->json(['status' => 'Erreur lors de l\'envoi de la notification'], 500);
        }
    
        return response()->json(['status' => 'Notification sent']);
    }
    
}
