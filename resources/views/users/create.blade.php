@extends('layouts.plantilla')

@section('title', 'Registros create')


@section('content')

    <h1>Registrate</h1>



    <form action="{{ route('users.store') }}" method="POST">

        @csrf
        <label>Nombre: <br> <input type="text" name="nombre"> </label>
        <br>
        <label>Apellidos: <br> <input type="text" name="apellidos"> </label>
        <br>
        <label>Correo electronico: <br> <input type="text" name="gmail"> </label>
        <br>
        <label>Contraseña <br> <input type="password" name="password"> </label>
        <br>
        <label>Role</label> <br>

            

            <select name="role_id">
                @foreach ($role as $role)
                    <option value=" {{$role['id']}} "> {{$role['name']}} </option>
                @endforeach
                
            </select>


        
        <br><br>

        <button type="submit"> Registrate </button>


    </form>

@endsection
