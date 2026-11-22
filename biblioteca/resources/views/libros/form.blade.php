<label for="codigo">Código</label>
<input id="codigo" name="codigo" type="text"
       value="{{ old('codigo', $libro->codigo) }}">
 
<label for="titulo">Título</label>
<input id="titulo" name="titulo" type="text"
       value="{{ old('titulo', $libro->titulo) }}">
 
<label for="autor">Autor</label>
<input id="autor" name="autor" type="text"
       value="{{ old('autor', $libro->autor) }}">
 
<label for="anio_publicacion">Año de publicación</label>
<input id="anio_publicacion" name="anio_publicacion" type="number"
       value="{{ old('anio_publicacion', $libro->anio_publicacion) }}">
 
<p>
    <button type="submit">{{ $boton }}</button>
    <a href="{{ route('libros.index') }}">Cancelar</a>
</p>
