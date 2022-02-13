<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{

    public function index()
    {
        return view('pages.index');
    }

    public function fetchMessage()
    {
        $messages = Message::all();

        $count = Message::count();

        return response()->json([
            'messages' => $messages,
            'count' => $count
        ]);
    }

    public function store(Request $request)
    {
        $message = $request->validate([
            'name' => 'required|alpha|max:30',
            'message' => 'required|max:300',
        ],
        [
            'name.required' => 'Поле имя не должно быть пустым.',
            'name.alpha' => 'Поле имя должно содержать буквы, а не цифры.',
            'name.max' => 'Поле имя должно быть не более 30 символов.',
            'message.required' => 'Поле сообщение не должно быть пустым.',
            'message.max' => 'Поле сообщение должно быть не более 300 символов.',
        ]);

        $data = Message::create($message);

        return response()->json(['data' => $data, 'success'=>'Сообщение добавлено']);
    }

    public function destroy(Request $request)
    {
        $message = Message::where('id', $request->id)->delete();

        return response()->json([$message, 'success'=>'Сообщение удалено']);
    }
}
