<?php

namespace App\Http\Controllers;
use App\Models\Mensaje;
use App\Models\Chat;
use Illuminate\Http\Request;

class MensajeController extends Controller
{
    


    public function index()
    {

        $mensajes = Mensaje::Orderby('id', 'desc')->paginate();
        return view('mensajes.index', compact('mensajes'));
    }


    public function create()
    {

        $chats = Chat::all();
        return view('mensajes.create', ['chat'=>$chats]);
        
    }

    public function store(Request $request)
    {

        $mensaje = new Mensaje();
        $mensaje->remitente = $request->remitente;
        $mensaje->contenido = $request->contenido;
        $mensaje->fechaHora = $request->fechaHora;
        
        $mensaje->chat_id = $request->chat_id;
        $mensaje->save();
        return redirect()->route('mensajes.show', compact('mensaje'));
    }

    public function show(Mensaje $mensaje)
    {

        return view('mensajes.show', compact('mensaje'));
    }


    public function edit(Mensaje $mensaje)
    {
        return view('mensajes.edit', compact('mensaje'));
    }



    public function update(Request $request, Mensaje $mensaje)
    {

        $mensaje->remitente = $request->remitente;
        $mensaje->contenido = $request->contenido;
        $mensaje->fechaHora = $request->fechaHora;
        
        $mensaje->chat_id = $request->chat_id;
        $mensaje->save();
        return redirect()->route('mensajes.show', $mensaje);
    }


    public function destroy(Mensaje $mensaje){

        $mensaje->delete();
        return redirect()->route('mensajes.index');
        
        
            }


            


}
