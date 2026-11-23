@extends('layouts.app')
@section('contenido')
  <h1>Control de tareas</h1>
  <p><a href="{{ route('tareas.create') }}">Nueva tarea</a></p>
 
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Descripción</th>
        <th>Responsable</th>
        <th>Fecha límite</th>
        <th>Estado</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($tareas as $tarea)
        <tr>
          <td>{{ $tarea->id }}</td>
          <td>{{ $tarea->titulo }}</td>
          <td>{{ $tarea->descripcion }}</td>
          <td>{{ $tarea->responsable }}</td>
          <td>{{ $tarea->fecha_limite->format('d/m/Y') }}</td>
          <td>{{ ucfirst($tarea->estado) }}</td>
        </tr>
      @empty
        <tr>
          <td colspan="6">No hay tareas registradas.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection

