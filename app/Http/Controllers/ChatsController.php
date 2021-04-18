<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Events\MessageSent;
use App\User;

class ChatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('chats');
    }

    public function pcahts($id)
    {
        return view('private')->with($id);
    }

    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    public function private($id)
    {
        return Message::with('user')->where('reciever_id',$id)->get();
    }

    public function sendprivateMessage(Request $request)
    {
        $message = auth()->user()->messages()->create([
            'message' => $request->message,
            'reciever_id' => $request->reciever_id
        ]);

        broadcast(new PrivateMessageSent($message->load('user')))->toOthers();

        return ['status' => 'success'];
    }

    public function sendMessage(Request $request)
    {
        $message = auth()->user()->messages()->create([
            'message' => $request->message
        ]);

        broadcast(new MessageSent($message->load('user')))->toOthers();

        return ['status' => 'success'];
    }
}
