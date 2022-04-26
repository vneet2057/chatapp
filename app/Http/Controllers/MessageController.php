<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //

    public function getMessage($id)
    {
        $messages = Message::where('message_chat_id', '=', $id)->get();

       
        return response()->json([
            'status' => 200,
            'data' => $messages
        ]);
    }
}
