@extends('layouts.app')
@section('contenido')
    <h1>Editar mascota #{{ $mascota->id }}</h1>
 
    <form method="POST" action="{{ route('mascotas.update', $mascota) }}"
          novalidate>
        @csrf
        @method('PUT')
        @include('mascotas._form', [
            'mascota' => $mascota,
            'boton' => 'Actualizar',
        ])
    </form>
@endsection
