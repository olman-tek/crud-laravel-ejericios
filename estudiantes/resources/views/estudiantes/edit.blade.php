@extends('layouts.app')
@section('contenido')
    <h1>Editar estudiante #{{ $estudiante->id }}</h1>
 
    <form method="POST" action="{{ route('estudiantes.update', $estudiante) }}"
          novalidate>
        @csrf
        @method('PUT')
        @include('estudiantes._form', [
            'estudiante' => $estudiante,
            'boton' => 'Actualizar',
        ])
    </form>
@endsection
