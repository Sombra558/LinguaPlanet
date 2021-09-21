<?php

use Illuminate\Database\Seeder;
use App\Models\Cursos\Modulo;
use App\Models\Cursos\Clase;
use App\Models\Cursos\Actividad;
use App\Models\Relaciones\ClasePremio;
use App\Models\Animals\Accesorios;
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
        $accesorios=Accesorios::get();
        foreach($modulos as $modulo){
                $inicia = new Carbon($modulo->inicia);
                       $premio1=$accesorios->random();
                       $todoslospremios1= Accesorios::where('tipo',$premio1->tipo)->get();
                        $clase1=Clase::create([
                            'inicia' => $inicia,
                            'finaliza' => $inicia->addDay(6),
                            'modulo_id' => $modulo->id,
                        ]);
                        foreach($todoslospremios1 as $pre){
                            ClasePremio::create([
                                'accesorio_id' => $pre->id,
                                'clase_id' => $clase1->id,
                            ]);
                        }

                        Actividad::create([
                            'tipo' => 'Palabras del día',
                            'icom' => '/images/actividades/palabra.svg',
                            'recurso' => 'https://www.youtube.com/embed/WmMzF6Agf_I',
                            'clase_id' => $clase1->id,
                        ]);
                        Actividad::create([
                            'tipo' => 'Video de apertura',
                            'icom' => '/images/actividades/video.svg',
                            'recurso' => 'https://www.youtube.com/embed/WmMzF6Agf_I',
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

                        $premio2=$accesorios->random();
                        $todoslospremios2= Accesorios::where('tipo',$premio2->tipo)->get();
                        $clase2=Clase::create([
                            'inicia' => $inicia->addDay(7),
                            'finaliza' => $inicia->addDay(12),
                            'modulo_id' => $modulo->id,
                        ]);
                        foreach($todoslospremios2 as $pre2){
                            ClasePremio::create([
                                'accesorio_id' => $pre2->id,
                                'clase_id' => $clase2->id,
                            ]);
                        }
                        Actividad::create([
                            'tipo' => 'Palabras del día',
                            'icom' => '/images/actividades/palabra.svg',
                            'recurso' => 'https://www.youtube.com/embed/WmMzF6Agf_I',
                            'clase_id' => $clase2->id,
                        ]);
                        Actividad::create([
                            'tipo' => 'Video de apertura',
                            'icom' => '/images/actividades/video.svg',
                            'recurso' => 'https://www.youtube.com/embed/WmMzF6Agf_I',
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
                        $premio3=$accesorios->random();
                        $todoslospremios3= Accesorios::where('tipo',$premio3->tipo)->get();
                        $clase3=Clase::create([
                            'inicia' => $inicia->addDay(14),
                            'finaliza' => $inicia->addDay(18),
                            'modulo_id' => $modulo->id,
                        ]);
                        foreach($todoslospremios3 as $pre3){
                            ClasePremio::create([
                                'accesorio_id' => $pre3->id,
                                'clase_id' => $clase3->id,
                            ]);
                        }
                        Actividad::create([
                            'tipo' => 'Palabras del día',
                            'icom' => '/images/actividades/palabra.svg',
                            'recurso' => 'https://www.youtube.com/embed/WmMzF6Agf_I',
                            'clase_id' => $clase3->id,
                        ]);
                        Actividad::create([
                            'tipo' => 'Video de apertura',
                            'icom' => '/images/actividades/video.svg',
                            'recurso' => 'https://www.youtube.com/embed/WmMzF6Agf_I',
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
                        $premio4=$accesorios->random();
                        $todoslospremios4= Accesorios::where('tipo',$premio4->tipo)->get();
                        $clase4=Clase::create([
                            'inicia' => $inicia->addDay(21),
                            'finaliza' => $inicia->addDay(24),
                            'modulo_id' => $modulo->id,
                        ]);

                        foreach($todoslospremios4 as $pre4){
                            ClasePremio::create([
                                'accesorio_id' => $pre4->id,
                                'clase_id' => $clase4->id,
                            ]);
                        }
                        Actividad::create([
                            'tipo' => 'Palabras del día',
                            'icom' => '/images/actividades/palabra.svg',
                            'recurso' => 'https://www.youtube.com/embed/WmMzF6Agf_I',
                            'clase_id' => $clase4->id,
                        ]);
                        Actividad::create([
                            'tipo' => 'Video de apertura',
                            'icom' => '/images/actividades/video.svg',
                            'recurso' => 'https://www.youtube.com/embed/WmMzF6Agf_I',
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
