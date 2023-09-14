<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{



    public function index()
    {

        $users = User::Orderby('id', 'desc')->paginate();
        // $users = User::all();
        return view('users.index', compact('users'));
    }


    public function create()
    {
        // return view('users.create');

        $roles = Role::all();
         return view('users.create', ['role'=>$roles]);
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

        $roles = Role::all();
        return view('users.edit', compact('user'), ['role'=>$roles]);
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



    public function destroy(User $user){

$user->delete();
return redirect()->route('users.index');


    }
}
