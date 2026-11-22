@extends('layouts.app')
@section('contenido')
    <h1>Registrar libro</h1>
 
    <form method="POST" action="{{ route('libros.store') }}" novalidate>
        @csrf
        @include('libros._form', [
            'libro' => new \App\Models\Libro,
            'boton' => 'Guardar',
        ])
    </form>
@endsection
