<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use function request;
use function response;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->paginate(4);

        return response()->json($messages);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|regex:/^[\pL\s\-]+$/u|max:30',
            'message' => 'required|max:300',
        ],
            [
                'name.required' => 'Поле имя не должно быть пустым.',
                'name.regex' => 'Поле имя должно содержать буквы.',
                'name.max' => 'Поле имя должно содержать не более 30 символов.',
                'message.required' => 'Поле сообщение не должно быть пустым.',
                'message.max' => 'Поле сообщение должно содержать не более 300 символов.',
            ]);

        $message = Message::create([
            'name' => request('name'),
            'message' => request('message')
        ]);

        return response()->json($message);
    }

    public function destroy($id)
    {
        $message = Message::find($id);
        $message->delete();

        return response()->json($message);
    }
}
