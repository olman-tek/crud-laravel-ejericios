<?php
 
namespace Database\Factories;
 
use Illuminate\Database\Eloquent\Factories\Factory;
 
class ProductoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'codigo' => 'PRO-' . fake()->unique()->numerify('####'),
            'nombre' => ucfirst(fake()->words(3, true)),
            'precio' => fake()->randomFloat(2, 1, 999),
            'existencias' => fake()->numberBetween(1, 100),
        ];
    }
 
    public function sinExistencias(): static
    {
        return $this->state(['existencias' => 0]);
    }
}
