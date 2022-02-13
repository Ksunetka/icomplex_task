<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->paginate(3);
        $count = Message::count();
        return view('pages.index', [
            'messages' => $messages,
            'count' => $count
        ]);
    }

    public function save(Request $request)
    {
        $message = new Message();
        $message->name = $request->name;
        $message->message = $request->message;
        $message->save();
        return back();
    }
}
