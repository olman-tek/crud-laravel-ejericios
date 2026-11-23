<?php
 
namespace Database\Factories;
 
use App\Models\Mascota;
use Illuminate\Database\Eloquent\Factories\Factory;
 
class MascotaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'codigo' => 'MAS-' . fake()->unique()->numerify('####'),
            'nombre' => fake()->firstName(),
            'especie' => fake()->randomElement(Mascota::ESPECIES),
            'propietario' => fake()->name(),
            'fecha_nacimiento' => fake()
                ->dateTimeBetween('-15 years', '-1 month')
                ->format('Y-m-d'),
        ];
    }
}
