<?php
    namespace App\Http\Controllers;

use App\Models\PrivateMessage;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PrivateMessageController extends Controller
{


    public function index()
    {
        $messages = PrivateMessage::all();
        return view('chat', compact('messages'));
    }

    public function store(Request $request)
    {
        $message = PrivateMessage::create([
            'sender_id' => $request->sender_id,
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
            'viewed' => false,
            'removed' => false,
        ]);

        broadcast(new MessageSent($message))->toOthers();

        return response()->json(['status' => 'Message Sent!']);
    }

}
