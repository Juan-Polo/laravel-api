<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{



    public function index()
    {

        $users = User::Orderby('id', 'desc')->paginate();
        return view('users.index', compact('users'));
    }


    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {

        $user = new User();
        $user->nombre = $request->nombre;
        $user->apellidos = $request->apellidos;
        $user->gmail = $request->gmail;
        $user->password = $request->password;
        $user->role_id = $request->role_id;
        $user->save();
        return redirect()->route('users.show', $user);
    }


    public function show(User $user)
    {

        return view('users.show', compact('user'));
    }


    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $user->nombre = $request->nombre;
        $user->apellidos = $request->apellidos;
        $user->gmail = $request->gmail;
        $user->password = $request->password;
        $user->role_id = $request->role_id;
        $user->save();
        return redirect()->route('users.show', $user);
    }
}
