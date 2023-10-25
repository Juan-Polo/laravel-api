<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;



class NotificationController extends Controller
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

     $notifications=Notification::all();
         return $notifications;
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
            'mensaje' => 'required|max:255',
            'fechaHora' => 'required|max:255',
            
        ]);

        $notification= Notification::create($request->all());

        return $notification;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //$notification = Notification::with(['posts.user'])->findOrFail($id);
        
        $notification = Notification::included()->findOrFail($id);
        return $notification;

        // return 'holaa';
    }


    public function update(Request $request, Notification $notification)
    {
        $request->validate([
            'mensaje' => 'required|max:255',
            'fechaHora' => 'required|max:255',
            
        ]);

        $notification->update($request->all());

        return $notification;
    }


    public function destroy(Notification $notification)
    {
        $notification->delete();
        return $notification;
    }

}
