<?php
 
namespace App\Http\Controllers;
 
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
 
class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::orderBy('id')->get();
 
        return view('productos.index', compact('productos'));
    }
 
    public function create()
    {
        return view('productos.create');
    }
 
    public function store(Request $request)
    {
        $datos = $this->validar($request);
 
        Producto::create($datos);
 
        return redirect()->route('productos.index')
            ->with('exito', 'Producto registrado correctamente.');
    }
 
    private function validar(Request $request, ?Producto $producto = null): array
    {
        return $request->validate([
            'codigo' => [
                'required', 'string', 'max:50',
                Rule::unique('productos', 'codigo')->ignore($producto?->id),
            ],
            'nombre' => ['required', 'string', 'max:100'],
            'precio' => [
                'bail', 'required', 'numeric', 'gt:0', 'decimal:0,2',
                'max:99999999.99',
            ],
            'existencias' => [
                'bail', 'required', 'integer', 'min:0', 'max:1000000',
            ],
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'codigo.max' => 'El código no puede superar :max caracteres.',
            'nombre.max' => 'El nombre no puede superar :max caracteres.',
            'unique' => 'Ya existe un producto con ese :attribute.',
            'numeric' => 'El precio debe ser un número.',
            'gt' => 'El precio debe ser mayor que cero.',
            'decimal' => 'El precio admite como máximo dos decimales.',
            'precio.max' => 'El precio es demasiado grande.',
            'integer' => 'Las existencias deben ser un número entero.',
            'min' => 'Las existencias no pueden ser negativas.',
            'existencias.max' => 'Las existencias son demasiado grandes.',
        ], [
            'codigo' => 'código',
            'nombre' => 'nombre',
            'precio' => 'precio',
            'existencias' => 'existencias',
        ]);
    }
}
