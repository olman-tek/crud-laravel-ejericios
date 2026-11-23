<?php
 
namespace App\Http\Controllers;
 
use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
 
class TareaController extends Controller
{
    public function index()
    {
        $tareas = Tarea::orderBy('id')->get();
 
        return view('tareas.index', compact('tareas'));
    }
 
    public function create()
    {
        return view('tareas.create');
    }
 
    public function store(Request $request)
    {
        $datos = $this->validar($request);
 
        Tarea::create($datos);
 
        return redirect()->route('tareas.index')
            ->with('exito', 'Tarea registrada correctamente.');
    }
 
    public function edit(Tarea $tarea)
    {
        return view('tareas.edit', compact('tarea'));
    }
 
    public function update(Request $request, Tarea $tarea)
    {
        $datos = $this->validar($request);
 
        $tarea->update($datos);
 
        return redirect()->route('tareas.index')
            ->with('exito', 'Tarea actualizada correctamente.');
    }
 
    private function validar(Request $request): array
    {
        return $request->validate([
            'titulo' => ['required', 'string', 'max:150'],
            'descripcion' => ['required', 'string', 'max:500'],
            'responsable' => ['required', 'string', 'max:100'],
            'fecha_limite' => ['bail', 'required', 'date'],
            'estado' => ['required', Rule::in(Tarea::ESTADOS)],
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no puede superar :max caracteres.',
            'date' => 'Escribe una fecha límite válida.',
            'in' => 'Selecciona un estado: pendiente, en proceso o completada.',
        ], [
            'titulo' => 'título',
            'descripcion' => 'descripción',
            'responsable' => 'responsable',
            'fecha_limite' => 'fecha límite',
            'estado' => 'estado',
        ]);
    }
}
