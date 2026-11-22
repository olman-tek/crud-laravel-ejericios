@extends('layouts.app')
@section('contenido')
    <h1>Editar libro #{{ $libro->id }}</h1>
 
    <form method="POST" action="{{ route('libros.update', $libro) }}"
          novalidate>
        @csrf
        @method('PUT')
        @include('libros._form', [
            'libro' => $libro,
            'boton' => 'Actualizar',
        ])
    </form>
@endsection
