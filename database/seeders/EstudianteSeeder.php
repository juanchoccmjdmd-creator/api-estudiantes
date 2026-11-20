<?php

namespace Database\Seeders;

use App\Models\Estudiante;
use Illuminate\Database\Seeder;

class EstudianteSeeder extends Seeder
{
    public function run(): void
    {
        $estudiantes = [
            ['nombre' => 'Juan David Molina', 'correo' => 'juan.molina@universidad.edu.co', 'programa' => 'Ingeniería Informática'],
            ['nombre' => 'Laura Sofía Gómez', 'correo' => 'laura.gomez@universidad.edu.co', 'programa' => 'Ingeniería Industrial'],
            ['nombre' => 'Carlos Andrés Pérez', 'correo' => 'carlos.perez@universidad.edu.co', 'programa' => 'Administración de Empresas'],
            ['nombre' => 'Valentina Rojas Castro', 'correo' => 'valentina.rojas@universidad.edu.co', 'programa' => 'Derecho'],
            ['nombre' => 'Mateo Díaz Herrera', 'correo' => 'mateo.diaz@universidad.edu.co', 'programa' => 'Ingeniería Informática'],
        ];

        foreach ($estudiantes as $estudiante) {
            Estudiante::firstOrCreate(['correo' => $estudiante['correo']], $estudiante);
        }
    }
}
