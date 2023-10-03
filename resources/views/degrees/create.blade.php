@extends('layouts.plantilla')

@section('title', 'Degrees')


@section('content')

    <h1>Crea un Grado</h1>



    <form action="{{ route('degrees.store') }}" method="POST">

        @csrf
        <label>Nombre: <br> <input type="text" name="nombre"> </label>
        <br>
        <label>Jornada: <br> <input type="text" name="jornada"> </label>
        <br>
        <label>Numero de alumnos: <br> <input type="number" name="numeroAlumnos"> </label>

        <br><br>

        <button type="submit" class="btn btn-primary"> Crear </button>


    </form>

@endsection
