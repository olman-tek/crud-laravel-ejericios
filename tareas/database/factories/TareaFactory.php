<?php
 
namespace Database\Factories;
 
use App\Models\Tarea;
use Illuminate\Database\Eloquent\Factories\Factory;
 
class TareaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'titulo' => rtrim(fake()->sentence(4), '.'),
            'descripcion' => fake()->text(150),
            'responsable' => fake()->name(),
            'fecha_limite' => fake()
                ->dateTimeBetween('-1 month', '+2 months')
                ->format('Y-m-d'),
            'estado' => fake()->randomElement(Tarea::ESTADOS),
        ];
    }
}
