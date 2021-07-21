<?php

use Illuminate\Database\Seeder;
use App\Models\Membresia\Membresia;
use App\Models\Relaciones\MembresiaCurso;
use App\Models\Cursos\Curso;

class MembresiaCursoTableSeeder extends Seeder
{
    public function run()
    {
        $cursos=Curso::get();
        $membresias=Membresia::get();
        foreach($cursos as $curso){
                MembresiaCurso::create([
                    'curso_id' => $curso->id,
                    'membresia_id' => $membresias->random()->id,
                ]);
          }
    }
}
