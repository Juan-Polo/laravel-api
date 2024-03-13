<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserController extends Controller
{




    public function index()
    {

        // $users = User::Orderby('id', 'desc')->paginate();
        //  $users = User::all();
        // return view('users.index', compact('users'));

        $users = User::included()->filter()->sort()->with('image', 'role')->get();

        return $users;
        // return view('users.index', compact('users'));
    }


    public function create()
    {
        // return view('users.create');

        $roles = Role::all();
        return view('users.create', ['role' => $roles]);
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
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'role_id' => 'required|max:255',
        ]);

        $user = User::create($request->all());

        return $user;
    }


    public function show($id)
    {

        $user = User::included()->findOrFail($id);
        $user = User::with('role', 'image')->find($id);
        return $user;
    }


    public function edit(User $user)
    {

        $roles = Role::all();
        return view('users.edit', compact('user'), ['role' => $roles]);
    }


    public function update(Request $request, User $user)
    {



        $request->validate([
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'role_id' => 'required|max:255',

        ]);

        $user->update($request->all());

        return $user;
    }



    public function destroy(User $user)
    {

        $user->delete();
        return redirect()->route('users.index');
    }
}
