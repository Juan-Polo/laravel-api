<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
 
         //  $notifications = Notification::Orderby('id', 'desc')->paginate();
         //  $notifications = Notification::all();
         //  return view('notifications.index', compact('notifications'));
 
      $chats=Chat::all();
          return $chats;
     }
 
 
 
     public function create()
     {
         // return view('users.create');
 
         // $roles = Role::all();
         //  return view('users.create', ['role'=>$roles]);
     }
 
 
 
     public function store(Request $request)
     {
         
         $request->validate([
             'name' => 'required|max:255',
             'participantes' => 'required|max:255',
             'degree_id'=> 'required|max:255'
             
         ]);
 
         $chats= Chat::create($request->all());
 
         return $chats;
     }
 
 
     /**
      * Display the specified resource.
      *
      * @param  \App\Models\Mensaje  $notification
      * @return \Illuminate\Http\Response
      */
 
     public function show($id)
     {
         //$notification = Notification::with(['posts.user'])->findOrFail($id);
         
         $chat = Chat::included()->findOrFail($id);
         return $chat;
 
         // return 'holaa';
     }
 
 
     public function update(Request $request, Chat $chat)
     {
         $request->validate([
             'name' => 'required|max:255',
             'participantes' => 'required|max:255',
             'degree_id'=> 'required|max:255'
             
         ]);
 
         $chat->update($request->all());
 
         return $chat;
     }
 
 
     public function destroy(Chat $chat)
     {
         $chat->delete();
         return $chat;
     }



}
