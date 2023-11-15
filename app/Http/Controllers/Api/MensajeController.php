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
 
    
 
      $mensajes=Mensaje::included()->filter()->sort()->get();
          return $mensajes;
     }
 
 
 
     
 
 
     public function store(Request $request)
     {
         
 
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
