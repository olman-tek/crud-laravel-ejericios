@extends('layouts.app')
@section('contenido')
    <h1>Registrar mascota</h1>
 
    <form method="POST" action="{{ route('mascotas.store') }}" novalidate>
        @csrf
        @include('mascotas._form', [
            'mascota' => new \App\Models\Mascota,
            'boton' => 'Guardar',
        ])
    </form>
@endsection
