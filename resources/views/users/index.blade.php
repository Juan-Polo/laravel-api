@extends('layouts.plantilla')

@section('title', 'Registros create')


@section('content')

    <h1>inicio registro</h1>
    <a href="{{ route('users.create') }}">Crear usuario</a>

    <ul>



        @foreach ($users as $user)
            <li>
                <a href="{{ route('users.show', $user->id) }}"> {{ $user->nombre }} </a>

            </li>
        @endforeach

    </ul>

    
    {{ $users->links() }}

@endsection
