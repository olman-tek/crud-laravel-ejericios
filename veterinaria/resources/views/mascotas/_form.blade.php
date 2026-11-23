@php
    $f = $mascota->fecha_nacimiento?->format('Y-m-d');
@endphp
<label for="codigo">Código</label>
<input id="codigo" name="codigo" type="text"
       value="{{ old('codigo', $mascota->codigo) }}">
 
<label for="nombre">Nombre</label>
<input id="nombre" name="nombre" type="text"
       value="{{ old('nombre', $mascota->nombre) }}">
 
<label for="especie">Especie</label>
<select id="especie" name="especie">
    <option value="">Seleccione...</option>
    @foreach (\App\Models\Mascota::ESPECIES as $especie)
        <option value="{{ $especie }}"
            @selected(old('especie', $mascota->especie) === $especie)>
            {{ ucfirst($especie) }}
        </option>
    @endforeach
</select>
 
<label for="propietario">Propietario</label>
<input id="propietario" name="propietario" type="text"
       value="{{ old('propietario', $mascota->propietario) }}">
 
<label for="fecha_nacimiento">Fecha de nacimiento</label>
<input id="fecha_nacimiento" name="fecha_nacimiento" type="date"
       value="{{ old('fecha_nacimiento', $f) }}">
 
<p>
    <button type="submit">{{ $boton }}</button>
    <a href="{{ route('mascotas.index') }}">Cancelar</a>
</p>
