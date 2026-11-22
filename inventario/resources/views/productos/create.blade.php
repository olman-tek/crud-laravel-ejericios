@extends('layouts.app')
@section('contenido')
    <h1>Registrar producto</h1>
 
    <form method="POST" action="{{ route('productos.store') }}" novalidate>
        @csrf
        @include('productos._form', [
            'producto' => new \App\Models\Producto,
            'boton' => 'Guardar',
        ])
    </form>
@endsection
