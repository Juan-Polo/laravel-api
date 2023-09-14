<?php

namespace App\Http\Controllers;

use App\Models\Degree;
use Illuminate\Http\Request;

class DegreeController extends Controller
{

    public function index()
    {

        $degrees = Degree::Orderby('id', 'desc')->paginate();
        return view('degrees.index', compact('degrees'));
    }


    public function create()
    {


        return view('degrees.create');
    }

    public function store(Request $request)
    {

        $degree = new Degree();
        $degree->nombre = $request->nombre;
        $degree->jornada = $request->jornada;
        $degree->numeroAlumnos = $request->numeroAlumnos;
        $degree->save();
        return redirect()->route('degrees.show', compact('degree'));
    }

    public function show(Degree $degree)
    {

        return view('degrees.show', compact('degree'));
    }


    public function edit(Degree $degree)
    {
        return view('degrees.edit', compact('degree'));
    }



    public function update(Request $request, Degree $degree)
    {

        $degree->nombre = $request->nombre;
        $degree->jornada = $request->jornada;
        $degree->numeroAlumnos = $request->numeroAlumnos;
        $degree->save();
        return redirect()->route('degrees.show', $degree);
    }


    public function destroy(Degree $degree){

        $degree->delete();
        return redirect()->route('degrees.index');
        
        
            }
}
