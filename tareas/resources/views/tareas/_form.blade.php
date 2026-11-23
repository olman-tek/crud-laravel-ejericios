@php
    $f = $tarea->fecha_limite?->format('Y-m-d');
@endphp
<label for="titulo">Título</label>
<input id="titulo" name="titulo" type="text"
       value="{{ old('titulo', $tarea->titulo) }}">
 
<label for="descripcion">Descripción</label>
<textarea id="descripcion" name="descripcion" rows="4"
          cols="50">{{ old('descripcion', $tarea->descripcion) }}</textarea>
 
<label for="responsable">Responsable</label>
<input id="responsable" name="responsable" type="text"
       value="{{ old('responsable', $tarea->responsable) }}">
 
<label for="fecha_limite">Fecha límite</label>
<input id="fecha_limite" name="fecha_limite" type="date"
       value="{{ old('fecha_limite', $f) }}">
 
<label for="estado">Estado</label>
<select id="estado" name="estado">
    <option value="">Seleccione...</option>
    @foreach (\App\Models\Tarea::ESTADOS as $estado)
        <option value="{{ $estado }}"
            @selected(old('estado', $tarea->estado) === $estado)>
            {{ ucfirst($estado) }}
        </option>
    @endforeach
</select>
 
<p>
    <button type="submit">{{ $boton }}</button>
    <a href="{{ route('tareas.index') }}">Cancelar</a>
</p>
