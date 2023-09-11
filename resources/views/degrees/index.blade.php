@extends('layouts.plantilla')

@section('title', 'Degrees')


@section('content')

    <h1>Lista de grados</h1>



    <a href="{{ route('degrees.create') }}">Crear grado</a>

    <ul>



        @foreach ($degrees as $degree)
            <li>
                <a href="{{ route('degrees.show', $degree->id) }}"> {{ $degree->nombre }} </a>

            </li>
        @endforeach

    </ul>

    {{ $degrees->links() }}


@endsection
