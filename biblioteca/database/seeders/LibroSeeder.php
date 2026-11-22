<?php
 
namespace Database\Seeders;
 
use App\Models\Libro;
use Illuminate\Database\Seeder;
 
class LibroSeeder extends Seeder
{
    public function run(): void
    {
        if (Libro::count() === 0) {
            Libro::factory()->count(10)->create();
        }
    }
}
