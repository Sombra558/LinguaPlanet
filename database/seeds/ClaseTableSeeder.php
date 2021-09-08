<?php

use Illuminate\Database\Seeder;
use App\Models\Cursos\Modulo;
use App\Models\Cursos\Clase;
use App\Models\Cursos\Actividad;
use Carbon\Carbon;
class ClaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modulos=Modulo::get();
    
        foreach($modulos as $modulo){
                $inicia = new Carbon($modulo->inicia);
             
                        $clase1=Clase::create([
                            'inicia' => $inicia,
                            'finaliza' => $inicia->addDay(6),
                            'modulo_id' => $modulo->id,
                        ]);
                        Actividad::create([
                            'tipo' => 'Palabras del día',
                            'icom' => '/images/actividades/palabra.svg',
                            'recurso' => 'https://www.youtube.com/watch?v=WmMzF6Agf_I',
                            'clase_id' => $clase1->id,
                        ]);
                        Actividad::create([
                            'tipo' => 'Video de apertura',
                            'icom' => '/images/actividades/video.svg',
                            'recurso' => 'https://www.youtube.com/watch?v=WmMzF6Agf_I',
                            'clase_id' => $clase1->id,
                        ]);
                        Actividad::create([
                            'tipo' => 'Libros',
                            'icom' => '/images/actividades/libro.svg',
                            'recurso' => '/images/recurso/ingles.pdf',
                            'clase_id' => $clase1->id,
                        ]);
                        Actividad::create([
                            'tipo' => 'Actividad',
                            'icom' => '/images/actividades/actividad.svg',
                            'recurso' => '/images/recurso/ingles.pdf',
                            'clase_id' => $clase1->id,
                        ]);


                        $clase2=Clase::create([
                            'inicia' => $inicia->addDay(7),
                            'finaliza' => $inicia->addDay(12),
                            'modulo_id' => $modulo->id,
                        ]);
                        Actividad::create([
                            'tipo' => 'Palabras del día',
                            'icom' => '/images/actividades/palabra.svg',
                            'recurso' => 'https://www.youtube.com/watch?v=WmMzF6Agf_I',
                            'clase_id' => $clase2->id,
                        ]);
                        Actividad::create([
                            'tipo' => 'Video de apertura',
                            'icom' => '/images/actividades/video.svg',
                            'recurso' => 'https://www.youtube.com/watch?v=WmMzF6Agf_I',
                            'clase_id' => $clase2->id,
                        ]);
                        Actividad::create([
                            'tipo' => 'Libros',
                            'icom' => '/images/actividades/libro.svg',
                            'recurso' => '/images/recurso/ingles.pdf',
                            'clase_id' => $clase2->id,
                        ]);
                        Actividad::create([
                            'tipo' => 'Actividad',
                            'icom' => '/images/actividades/actividad.svg',
                            'recurso' => '/images/recurso/ingles.pdf',
                            'clase_id' => $clase2->id,
                        ]);
                        $clase3=Clase::create([
                            'inicia' => $inicia->addDay(14),
                            'finaliza' => $inicia->addDay(18),
                            'modulo_id' => $modulo->id,
                        ]);
                        Actividad::create([
                            'tipo' => 'Palabras del día',
                            'icom' => '/images/actividades/palabra.svg',
                            'recurso' => 'https://www.youtube.com/watch?v=WmMzF6Agf_I',
                            'clase_id' => $clase3->id,
                        ]);
                        Actividad::create([
                            'tipo' => 'Video de apertura',
                            'icom' => '/images/actividades/video.svg',
                            'recurso' => 'https://www.youtube.com/watch?v=WmMzF6Agf_I',
                            'clase_id' => $clase3->id,
                        ]);
                        Actividad::create([
                            'tipo' => 'Libros',
                            'icom' => '/images/actividades/libro.svg',
                            'recurso' => '/images/recurso/ingles.pdf',
                            'clase_id' => $clase3->id,
                        ]);
                        Actividad::create([
                            'tipo' => 'Actividad',
                            'icom' => '/images/actividades/actividad.svg',
                            'recurso' => '/images/recurso/ingles.pdf',
                            'clase_id' => $clase3->id,
                        ]);
                        $clase4=Clase::create([
                            'inicia' => $inicia->addDay(21),
                            'finaliza' => $inicia->addDay(24),
                            'modulo_id' => $modulo->id,
                        ]);
                        Actividad::create([
                            'tipo' => 'Palabras del día',
                            'icom' => '/images/actividades/palabra.svg',
                            'recurso' => 'https://www.youtube.com/watch?v=WmMzF6Agf_I',
                            'clase_id' => $clase4->id,
                        ]);
                        Actividad::create([
                            'tipo' => 'Video de apertura',
                            'icom' => '/images/actividades/video.svg',
                            'recurso' => 'https://www.youtube.com/watch?v=WmMzF6Agf_I',
                            'clase_id' => $clase4->id,
                        ]);
                        Actividad::create([
                            'tipo' => 'Libros',
                            'icom' => '/images/actividades/libro.svg',
                            'recurso' => '/images/recurso/ingles.pdf',
                            'clase_id' => $clase4->id,
                        ]);
                        Actividad::create([
                            'tipo' => 'Actividad',
                            'icom' => '/images/actividades/actividad.svg',
                            'recurso' => '/images/recurso/ingles.pdf',
                            'clase_id' => $clase4->id,
                        ]);
                    
                     
                       
                
             
          }
    }
}
