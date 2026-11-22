<label for="codigo">Código</label>
<input id="codigo" name="codigo" type="text"
       value="{{ old('codigo', $producto->codigo) }}">
 
<label for="nombre">Nombre</label>
<input id="nombre" name="nombre" type="text"
       value="{{ old('nombre', $producto->nombre) }}">
 
<label for="precio">Precio</label>
<input id="precio" name="precio" type="number" step="0.01"
       value="{{ old('precio', $producto->precio) }}">
 
<label for="existencias">Existencias</label>
<input id="existencias" name="existencias" type="number"
       value="{{ old('existencias', $producto->existencias) }}">
 
<p>
    <button type="submit">{{ $boton }}</button>
    <a href="{{ route('productos.index') }}">Cancelar</a>
</p>
