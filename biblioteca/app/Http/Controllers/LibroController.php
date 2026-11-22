<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

 
use App\Models\Libro;
 
class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::orderBy('id')->get();
 
        return view('libros.index', compact('libros'));
    }

        public function create()
    {
        return view('libros.create');
    }
    
    public function store(Request $request)
    {
        $datos = $this->validar($request);
    
        Libro::create($datos);
    
        return redirect()->route('libros.index')
            ->with('exito', 'Libro registrado correctamente.');
    }
    
    private function validar(Request $request, ?Libro $libro = null): array
    {
        return $request->validate([
            'codigo' => [
                'required', 'string', 'max:50',
                Rule::unique('libros', 'codigo')->ignore($libro?->id),
            ],
            'titulo' => ['required', 'string', 'max:150'],
            'autor' => ['required', 'string', 'max:100'],
            'anio_publicacion' => [
                'required', 'integer', 'between:1450,' . now()->year,
            ],
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no puede superar :max caracteres.',
            'unique' => 'Ya existe un libro con ese :attribute.',
            'integer' => 'El campo :attribute debe ser un número entero.',
            'between' => 'El campo :attribute debe estar entre :min y :max.',
        ], [
            'codigo' => 'código',
            'titulo' => 'título',
            'autor' => 'autor',
            'anio_publicacion' => 'año de publicación',
        ]);
    }

}
