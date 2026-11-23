@extends('layouts.app')
@section('contenido')
    <h1>Registrar estudiante</h1>
 
    <form method="POST" action="{{ route('estudiantes.store') }}" novalidate>
        @csrf
        @include('estudiantes._form', [
            'estudiante' => new \App\Models\Estudiante,
            'boton' => 'Guardar',
        ])
    </form>
@endsection
