@extends('layouts.app')
@section('contenido')
  <h1>Registro de mascotas</h1>
  <p><a href="{{ route('mascotas.create') }}">Nueva mascota</a></p>
 
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Código</th>
        <th>Nombre</th>
        <th>Especie</th>
        <th>Propietario</th>
        <th>Fecha de nacimiento</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($mascotas as $mascota)
        <tr>
          <td>{{ $mascota->id }}</td>
          <td>{{ $mascota->codigo }}</td>
          <td>{{ $mascota->nombre }}</td>
          <td>{{ ucfirst($mascota->especie) }}</td>
          <td>{{ $mascota->propietario }}</td>
          <td>{{ $mascota->fecha_nacimiento->format('d/m/Y') }}</td>
          <td>
            <a href="{{ route('mascotas.edit', $mascota) }}">Editar</a>
            <form method="POST" style="display:inline"
                  action="{{ route('mascotas.destroy', $mascota) }}"
                  onsubmit="return confirm('¿Eliminar esta mascota?');">
              @csrf
              @method('DELETE')
              <button type="submit">Eliminar</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="7">No hay mascotas registradas.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection
