<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use Illuminate\Http\Request;

class DegreeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $users = User::Orderby('id', 'desc')->paginate();
        //  $users = User::all();
        // return view('users.index', compact('users'));

        $degrees = Degree::all();
        return $degrees;
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
            'nombre' => 'required|max:255',
            'jornada' => 'required|max:255',
            'numeroAlumnos' => 'required|max:255'

        ]);

        $degree = Degree::create($request->all());

        return $degree;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mensaje  $notification
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {

        $degree = Degree::included()->findOrFail($id);
        return $degree;
    }





    public function update(Request $request, Degree $degree)
    {
        // $user->nombre = $request->nombre;
        // $user->apellidos = $request->apellidos;
        // $user->gmail = $request->gmail;
        // $user->password = $request->password;
        // $user->role_id = $request->role_id;
        // $user->save();
        // return redirect()->route('users.show', $user);


        $request->validate([
            'nombre' => 'required|max:255',
            'jornada' => 'required|max:255',
            'numeroAlumnos' => 'required|max:255',

        ]);

        $degree->update($request->all());

        return $degree;
    }



    public function destroy(Degree $degree)
    {

        $degree->delete();
        return $degree;
    }
}
