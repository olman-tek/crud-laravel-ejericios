@php
    $f = $estudiante->fecha_nacimiento?->format('Y-m-d');
@endphp
<label for="numero_cuenta">Número de cuenta</label>
<input id="numero_cuenta" name="numero_cuenta" type="text"
       value="{{ old('numero_cuenta', $estudiante->numero_cuenta) }}">
 
<label for="nombre">Nombre</label>
<input id="nombre" name="nombre" type="text"
       value="{{ old('nombre', $estudiante->nombre) }}">
 
<label for="correo">Correo electrónico</label>
<input id="correo" name="correo" type="email"
       value="{{ old('correo', $estudiante->correo) }}">
 
<label for="fecha_nacimiento">Fecha de nacimiento</label>
<input id="fecha_nacimiento" name="fecha_nacimiento" type="date"
       value="{{ old('fecha_nacimiento', $f) }}">
 
<p>
    <button type="submit">{{ $boton }}</button>
    <a href="{{ route('estudiantes.index') }}">Cancelar</a>
</p>
