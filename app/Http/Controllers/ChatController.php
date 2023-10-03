<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Degree;
use Illuminate\Http\Request;

class ChatController extends Controller
{



    public function index()
    {

        $chats = Chat::Orderby('id', 'desc')->paginate();
        return view('chats.index', compact('chats'));
    }


    public function create()
    {


        $degrees = Degree::all();
        return view('chats.create', ['degree' => $degrees]);
    }

    public function store(Request $request)
    {

        $chat = new Chat();
        $chat->name = $request->name;
        $chat->participantes = $request->participantes;
        $chat->degree_id = $request->degree_id;
        $chat->save();
        return redirect()->route('chats.show', compact('chat'));
    }

    public function show(Chat $chat)
    {

        return view('chats.show', compact('chat'));
    }


    public function edit(Chat $chat)
    {
        return view('chats.edit', compact('chat'));
    }



    public function update(Request $request, Chat $chat)
    {

        $chat->name = $request->name;
        $chat->participantes = $request->participantes;
        $chat->degree_id = $request->degree_id;
        $chat->save();
        return redirect()->route('chats.show', $chat);
    }


    public function destroy(Chat $chat)
    {

        $chat->delete();
        return redirect()->route('chats.index');
    }
}
