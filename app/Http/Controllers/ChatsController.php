<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ChatsController extends Controller
{

    public function index(User $recipient)
    {
        $messages = Message::where([['user_sender_id', "=" ,Auth::user()->id], ['user_recipient_id', "=" ,$recipient->id]])->orWhere([['user_recipient_id', "=" ,Auth::user()->id], ['user_sender_id', "=" ,$recipient->id]])->get();
        return view('chat', ['messages' => $messages, 'recipient' => $recipient]);
    }

    function store(Request $request , User $recipient) {
        $validator = Validator::make($request->all(), [
            //
        ]);
        $messageContent = $request->get('content');
      $message = Message::create([
          'user_sender_id' => Auth::user()->id,
          'user_recipient_id' => $recipient->id,
          'message' => $request->get('content'),
      ]);
        return redirect()->route('chat', ["recipient" => $recipient]);
  }
}
