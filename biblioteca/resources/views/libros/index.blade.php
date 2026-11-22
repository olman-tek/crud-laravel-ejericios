@extends('layouts.app')
@section('contenido')
    <h1>Catálogo de libros</h1>
    <p><a href="{{ route('libros.create') }}">Nuevo libro</a></p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Año de publicación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($libros as $libro)
                <tr>
                    <td>{{ $libro->id }}</td>
                    <td>{{ $libro->codigo }}</td>
                    <td>{{ $libro->titulo }}</td>
                    <td>{{ $libro->autor }}</td>
                    <td>{{ $libro->anio_publicacion }}</td>
                    <td>
                        <a href="{{ route('libros.edit', $libro) }}">Editar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay libros registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
