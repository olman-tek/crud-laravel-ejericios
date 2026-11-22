@extends('layouts.app')
@section('contenido')
  <h1>Inventario de productos</h1>
  <p><a href="{{ route('productos.create') }}">Nuevo producto</a></p>
 
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Código</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Existencias</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($productos as $producto)
        <tr>
          <td>{{ $producto->id }}</td>
          <td>{{ $producto->codigo }}</td>
          <td>{{ $producto->nombre }}</td>
          <td>{{ number_format($producto->precio, 2) }}</td>
          <td>
            @if ($producto->existencias == 0)
              Sin existencias
            @else
              {{ $producto->existencias }}
            @endif
          </td>
          <td>
            <a href="{{ route('productos.edit', $producto) }}">Editar</a>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="6">No hay productos registrados.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection

