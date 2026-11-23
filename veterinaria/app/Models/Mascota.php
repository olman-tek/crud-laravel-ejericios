<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Mascota extends Model
{
    use HasFactory;
 
    public const ESPECIES = ['perro', 'gato', 'otro'];
 
    protected $fillable = [
        'codigo',
        'nombre',
        'especie',
        'propietario',
        'fecha_nacimiento',
    ];
 
    protected function casts(): array
    {
        return [
            'fecha_nacimiento' => 'date',
        ];
    }
}
