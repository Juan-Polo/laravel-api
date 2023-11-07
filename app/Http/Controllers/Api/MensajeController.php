<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mensaje;
use Illuminate\Http\Request;

class MensajeController extends Controller
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
 
      $mensajes=Mensaje::all();
          return $mensajes;
     }
 
 
 
     public function create()
     {
         // return view('users.create');
 
         // $roles = Role::all();
         //  return view('users.create', ['role'=>$roles]);
     }
 
 
 
     public function store(Request $request)
     {
         // $user = new User();
         // $user->nombre = $request->nombre;
         // $user->apellidos = $request->apellidos;
         // $user->gmail = $request->gmail;
         // $user->password = $request->password;
         // $user->role_id = $request->role_id;
         // $user->save();
         // return redirect()->route('users.show', $user);
 
         $request->validate([
            'remitente' => 'required|max:255',
            'contenido' => 'required|max:255',
            'fechaHora' => 'required|max:255',
            'chat_id' => 'required|max:255',
             
         ]);
 
         $mensajes= Mensaje::create($request->all());
 
         return $mensajes;
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
         
         $mensaje = Mensaje::included()->findOrFail($id);
         return $mensaje;
 
         // return 'holaa';
     }
 
 
     public function update(Request $request, Mensaje $mensaje)
     {
         $request->validate([
             'remitente' => 'required|max:255',
             'contenido' => 'required|max:255',
             'fechaHora' => 'required|max:255',
             'chat_id' => 'required|max:255',
             

         ]);
 
         $mensaje->update($request->all());
 
         return $mensaje;
     }
 
 
     public function destroy(Mensaje $mensaje)
     {
         $mensaje->delete();
         return $mensaje;
     }


}
