<?php
 
namespace App\Http\Controllers;
 
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
 
class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::orderBy('id')->get();
 
        return view('estudiantes.index', compact('estudiantes'));
    }
 
    public function create()
    {
        return view('estudiantes.create');
    }
 
    public function store(Request $request)
    {
        $datos = $this->validar($request);
 
        Estudiante::create($datos);
 
        return redirect()->route('estudiantes.index')
            ->with('exito', 'Estudiante registrado correctamente.');
    }
 
    private function validar(Request $request, ?Estudiante $estudiante = null): array
    {
        return $request->validate([
            'numero_cuenta' => [
                'required', 'string', 'max:20',
                Rule::unique('estudiantes', 'numero_cuenta')
                    ->ignore($estudiante?->id),
            ],
            'nombre' => ['required', 'string', 'max:100'],
            'correo' => [
                'bail', 'required', 'email', 'max:150',
                Rule::unique('estudiantes', 'correo')
                    ->ignore($estudiante?->id),
            ],
            'fecha_nacimiento' => [
                'bail', 'required', 'date', 'before_or_equal:today',
            ],
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no puede superar :max caracteres.',
            'unique' => 'Ya existe un estudiante con ese :attribute.',
            'email' => 'Escribe un correo electrónico válido.',
            'date' => 'Escribe una fecha de nacimiento válida.',
            'before_or_equal' => 'La fecha de nacimiento no puede ser futura.',
        ], [
            'numero_cuenta' => 'número de cuenta',
            'nombre' => 'nombre',
            'correo' => 'correo electrónico',
            'fecha_nacimiento' => 'fecha de nacimiento',
        ]);
    }
}
