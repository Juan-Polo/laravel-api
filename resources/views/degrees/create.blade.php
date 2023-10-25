@extends('layouts.plantilla')

@section('title', 'Degrees')


@section('content')

    <h1>Crea un Grado</h1>



    <form action="{{ route('degrees.store') }}" method="POST"  enctype="multipart/form-data">

        @csrf
        <label>Nombre: <br> <input type="text" name="nombre"> </label>
        <br>
        <label>Jornada: <br> <input type="text" name="jornada"> </label>
        <br>
        <label>Numero de alumnos: <br> <input type="number" name="numeroAlumnos"> </label>
        <label >Adjuntar archivo PDF</label>
        <br><br>
        <input type="file" name="ImgUrl" class="form-control-file" accept="png/*">
        <br><br>

        <button type="submit" class="btn btn-primary"> Crear </button>


    </form>

@endsection
