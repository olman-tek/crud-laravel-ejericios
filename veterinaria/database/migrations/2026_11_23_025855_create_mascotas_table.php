<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 50)->unique();
            $table->string('nombre', 80);
            $table->string('especie', 20);
            $table->string('propietario', 100);
            $table->date('fecha_nacimiento');
            $table->timestamps();
        });
    }
 
    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};
