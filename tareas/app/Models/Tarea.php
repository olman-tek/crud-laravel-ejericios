<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Tarea extends Model
{
    use HasFactory;
 
    public const ESTADOS = ['pendiente', 'en proceso', 'completada'];
 
    protected $fillable = [
        'titulo',
        'descripcion',
        'responsable',
        'fecha_limite',
        'estado',
    ];
 
    protected function casts(): array
    {
        return [
            'fecha_limite' => 'date',
        ];
    }
}
