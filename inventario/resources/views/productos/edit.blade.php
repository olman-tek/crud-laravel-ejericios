@extends('layouts.app')
@section('contenido')
    <h1>Editar producto #{{ $producto->id }}</h1>
 
    <form method="POST" action="{{ route('productos.update', $producto) }}"
          novalidate>
        @csrf
        @method('PUT')
        @include('productos._form', [
            'producto' => $producto,
            'boton' => 'Actualizar',
        ])
    </form>
@endsection
