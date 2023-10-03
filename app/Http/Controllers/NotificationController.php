<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{



    public function index()
    {

        $notifications = Notification::Orderby('id', 'desc')->paginate();
        return view('notifications.index', compact('notifications'));
    }


    public function create()
    {
        return view('notifications.create');
    }


    public function store(Request $request)
    {

        $notification = new Notification();

        $notification->mensaje = $request->mensaje;
        $notification->fechaHora = $request->fechaHora;

        $notification->save();
        return redirect()->route('notifications.show', compact('notification'));
    }

    public function show(Notification $notification)
    {

        return view('notifications.show', compact('notification'));
    }


    public function edit(Notification $notification)
    {
        return view('notifications.edit', compact('notification'));
    }



    public function update(Request $request, Notification $notification)
    {


        $notification->mensaje = $request->mensaje;
        $notification->fechaHora = $request->fechaHora;


        $notification->save();
        return redirect()->route('notifications.show', $notification);
    }


    public function destroy(Notification $notification)
    {

        $notification->delete();
        return redirect()->route('notifications.index');
    }
}
