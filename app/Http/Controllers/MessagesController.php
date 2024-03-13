<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessages;
use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function get()
    {
        $messages = Message::with("user")->get();
        return response()->json($messages);
    }

    public function create(StoreMessages $request)
    {
        $request->validated();
        $created = Message::insert($request->all());
        return response()->json($created);
    }

    public function update(Message $message, StoreMessages $request)
    {
        $message->update($request->all());
        return response()->json($message);
    }

    public function delete(Message $message)
    {
        $message->delete();
        return response()->json("", 204);
    }
}
