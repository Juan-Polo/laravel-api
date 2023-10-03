@extends('layouts.plantilla')

@section('title', 'Degrees')


@section('content')

    <h1>Lista de grados</h1>


<div class="container" >

    <a href="{{ route('degrees.create') }}">Crear grado</a>
    <div class="row"> 
     
    
    


        
        @foreach ($degrees as $degree)

        <ul class=" col-3   m-md-5  bg-body-tertiary card   grid gap-0 row-gap-2" style="height: 25rem "  >
            <img class="card-img-top" src="https://hips.hearstapps.com/hmg-prod/images/2023-mclaren-artura-101-1655218102.jpg?crop=0.8889431489846579xw:1xh;center,top&resize=1200:*" alt="Card image cap">
            <div class=""> <button class="btn btn-outline-info"> Informacion</button> </div>
         <li >
                <a  href="{{ route('degrees.show', $degree->id) }}"> {{ $degree->nombre }} </a>

            </li>
            <li> {{ $degree->jornada }} </li>
            <li> {{ $degree->numeroAlumnos}} </li>
        </ul>
        @endforeach
    
    





    {{ $degrees->links() }}

    <div> 

</div>


@endsection
