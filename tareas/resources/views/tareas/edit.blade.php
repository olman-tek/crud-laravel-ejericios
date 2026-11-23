@extends('layouts.app')
@section('contenido')
    <h1>Editar tarea #{{ $tarea->id }}</h1>
 
    <form method="POST" action="{{ route('tareas.update', $tarea) }}"
          novalidate>
        @csrf
        @method('PUT')
        @include('tareas._form', [
            'tarea' => $tarea,
            'boton' => 'Actualizar',
        ])
    </form>
@endsection
