@extends('layouts.app')
@section('contenido')
    <h1>Registrar tarea</h1>
 
    <form method="POST" action="{{ route('tareas.store') }}" novalidate>
        @csrf
        @include('tareas._form', [
            'tarea' => new \App\Models\Tarea,
            'boton' => 'Guardar',
        ])
    </form>
@endsection
