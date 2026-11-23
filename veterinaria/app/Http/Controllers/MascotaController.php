<?php
 
namespace App\Http\Controllers;
 
use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
 
class MascotaController extends Controller
{
    public function index()
    {
        $mascotas = Mascota::orderBy('id')->get();
 
        return view('mascotas.index', compact('mascotas'));
    }
 
    public function create()
    {
        return view('mascotas.create');
    }
 
    public function store(Request $request)
    {
        $datos = $this->validar($request);
 
        Mascota::create($datos);
 
        return redirect()->route('mascotas.index')
            ->with('exito', 'Mascota registrada correctamente.');
    }
 
    public function edit(Mascota $mascota)
    {
        return view('mascotas.edit', compact('mascota'));
    }
 
    public function update(Request $request, Mascota $mascota)
    {
        $datos = $this->validar($request, $mascota);
 
        $mascota->update($datos);
 
        return redirect()->route('mascotas.index')
            ->with('exito', 'Mascota actualizada correctamente.');
    }
 
    private function validar(Request $request, ?Mascota $mascota = null): array
    {
        return $request->validate([
            'codigo' => [
                'required', 'string', 'max:50',
                Rule::unique('mascotas', 'codigo')->ignore($mascota?->id),
            ],
            'nombre' => ['required', 'string', 'max:80'],
            'especie' => ['required', Rule::in(Mascota::ESPECIES)],
            'propietario' => ['required', 'string', 'max:100'],
            'fecha_nacimiento' => [
                'bail', 'required', 'date', 'before_or_equal:today',
            ],
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no puede superar :max caracteres.',
            'unique' => 'Ya existe una mascota con ese :attribute.',
            'in' => 'Selecciona una especie válida: perro, gato u otro.',
            'date' => 'Escribe una fecha de nacimiento válida.',
            'before_or_equal' => 'La fecha de nacimiento no puede ser futura.',
        ], [
            'codigo' => 'código',
            'nombre' => 'nombre',
            'especie' => 'especie',
            'propietario' => 'propietario',
            'fecha_nacimiento' => 'fecha de nacimiento',
        ]);
    }
}
