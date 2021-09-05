<?php

use Illuminate\Database\Seeder;
use App\Models\Cursos\Modulo;
use App\Models\Cursos\Clase;
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
             
                        Clase::create([
                            'inicia' => $inicia,
                            'finaliza' => $inicia->addDay(6),
                            'modulo_id' => $modulo->id,
                        ]);

                        Clase::create([
                            'inicia' => $inicia->addDay(7),
                            'finaliza' => $inicia->addDay(12),
                            'modulo_id' => $modulo->id,
                        ]);
                        Clase::create([
                            'inicia' => $inicia->addDay(14),
                            'finaliza' => $inicia->addDay(18),
                            'modulo_id' => $modulo->id,
                        ]);
                        Clase::create([
                            'inicia' => $inicia->addDay(21),
                            'finaliza' => $inicia->addDay(24),
                            'modulo_id' => $modulo->id,
                        ]);
                    
                     
                       
                
             
          }
    }
}
