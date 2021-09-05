<?php

use Illuminate\Database\Seeder;
use App\Models\Animals\Animal;
use App\Models\Animals\Accesorios;
class AnimalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panda = Animal::create([
            'animal'  => "Panda",
            'cara'  => "/images/animales/caras/panda.svg",
            'cuerpo'  => "/images/animales/cuerpo/panda.svg",
        ]);
        Accesorios::create([
            'animal_id'  => $panda->id,
            'accesorio'  => "/images/animales/accesorios/panda/Gorro.svg",
            'nombre'  => "Gorro",
            'tipo'  => "gorro",
            'corde_x' => -3,
            'corde_y' => 17,
        ]);
        Accesorios::create([
            'animal_id'  => $panda->id,
            'accesorio'  => "/images/animales/accesorios/panda/Guitarra.svg",
            'nombre'  => "Guitarra",
            'tipo'  => "guitarra",
            'corde_x' => 30,
            'corde_y' => 200,
        ]);
        Accesorios::create([
            'animal_id'  => $panda->id,
            'accesorio'  => "/images/animales/accesorios/panda/Yoyo.svg",
            'nombre'  => "Yoyo",
            'tipo'  => "yoyo",
            'corde_x' => 213,
            'corde_y' => 225,
        ]);
        Accesorios::create([
            'animal_id'  => $panda->id,
            'accesorio'  => "/images/animales/accesorios/panda/Gafas.svg",
            'nombre'  => "Gafas",
            'tipo'  => "gafas",
            'corde_x' => 32,
            'corde_y' => 117,
        ]);
        Accesorios::create([
            'animal_id'  => $panda->id,
            'accesorio'  => "/images/animales/accesorios/panda/Camisa.svg",
            'nombre'  => "Camisa",
            'tipo'  => "camisa",
            'corde_x' => -7,
            'corde_y' => 208,
        ]);
        Accesorios::create([
            'animal_id'  => $panda->id,
            'accesorio'  => "/images/animales/accesorios/panda/Bufanda.svg",
            'nombre'  => "Bufanda",
            'tipo'  => "bufanda",
            'corde_x' => 45,
            'corde_y' => 213,
        ]);
        Accesorios::create([
            'animal_id'  => $panda->id,
            'accesorio'  => "/images/animales/accesorios/panda/Botas.svg",
            'nombre'  => "Botas",
            'tipo'  => "botas",
            'corde_x' => 51,
            'corde_y' => 343,
        ]);

        $gato=Animal::create([
            'animal'  => "Gato",
            'cara'  => "/images/animales/caras/gato.svg",
            'cuerpo'  => "/images/animales/cuerpo/gato.svg",
        ]);
        Accesorios::create([
            'animal_id'  => $gato->id,
            'accesorio'  => "/images/animales/accesorios/gato/Gorro.svg",
            'nombre'  => "Gorro",
            'tipo'  => "gorro",
            'corde_x' => 39,
            'corde_y' => 30,
        ]);
        Accesorios::create([
            'animal_id'  => $gato->id,
            'accesorio'  => "/images/animales/accesorios/gato/Guitarra.svg",
            'nombre'  => "Guitarra",
            'tipo'  => "guitarra",
            'corde_x' => 55,
            'corde_y' => 205,
        ]);
        Accesorios::create([
            'animal_id'  => $gato->id,
            'accesorio'  => "/images/animales/accesorios/gato/Yoyo.svg",
            'nombre'  => "Yoyo",
            'tipo'  => "yoyo",
            'corde_x' => 230,
            'corde_y' => 252,
        ]);
        Accesorios::create([
            'animal_id'  => $gato->id,
            'accesorio'  => "/images/animales/accesorios/gato/Gafas.svg",
            'nombre'  => "Gafas",
            'tipo'  => "gafas",
            'corde_x' => 66,
            'corde_y' => 115,
        ]);
    
        Accesorios::create([
            'animal_id'  => $gato->id,
            'accesorio'  => "/images/animales/accesorios/gato/Bufanda.svg",
            'nombre'  => "Bufanda",
            'tipo'  => "bufanda",
            'corde_x' => 80,
            'corde_y' => 213,
        ]);
        Accesorios::create([
            'animal_id'  => $gato->id,
            'accesorio'  => "/images/animales/accesorios/gato/Botas.svg",
            'nombre'  => "Botas",
            'tipo'  => "botas",
            'corde_x' => 84,
            'corde_y' => 344,
        ]);
        Accesorios::create([
            'animal_id'  => $gato->id,
            'accesorio'  => "/images/animales/accesorios/gato/Camisa.svg",
            'nombre'  => "Camisa",
            'tipo'  => "camisa",
            'corde_x' => 45,
            'corde_y' => 223,
        ]);


        $perro=Animal::create([
            'animal'  => "Perro",
            'cara'  => "/images/animales/caras/perro.svg",
            'cuerpo'  => "/images/animales/cuerpo/perro.svg",
        ]);
        Accesorios::create([
            'animal_id'  => $perro->id,
            'accesorio'  => "/images/animales/accesorios/perro/Gorro.svg",
            'nombre'  => "Gorro",
            'tipo'  => "gorro",
            'corde_x' => 17,
            'corde_y' => 35,
        ]);
        Accesorios::create([
            'animal_id'  => $perro->id,
            'accesorio'  => "/images/animales/accesorios/perro/Guitarra.svg",
            'nombre'  => "Guitarra",
            'tipo'  => "guitarra",
            'corde_x' => 50,
            'corde_y' => 205,
        ]);
        Accesorios::create([
            'animal_id'  => $perro->id,
            'accesorio'  => "/images/animales/accesorios/perro/Yoyo.svg",
            'nombre'  => "Yoyo",
            'tipo'  => "yoyo",
            'corde_x' => 220,
            'corde_y' => 232,
        ]);
        Accesorios::create([
            'animal_id'  => $perro->id,
            'accesorio'  => "/images/animales/accesorios/perro/Gafas.svg",
            'nombre'  => "Gafas",
            'tipo'  => "gafas",
            'corde_x' => 52,
            'corde_y' => 105,
        ]);
        Accesorios::create([
            'animal_id'  => $perro->id,
            'accesorio'  => "/images/animales/accesorios/perro/Camisa.svg",
            'nombre'  => "Camisa",
            'tipo'  => "camisa",
            'corde_x' => 37,
            'corde_y' => 223,
        ]);
        Accesorios::create([
            'animal_id'  => $perro->id,
            'accesorio'  => "/images/animales/accesorios/perro/Bufanda.svg",
            'nombre'  => "Bufanda",
            'tipo'  => "bufanda",
            'corde_x' => 71,
            'corde_y' => 210,
        ]);
        Accesorios::create([
            'animal_id'  => $perro->id,
            'accesorio'  => "/images/animales/accesorios/perro/Botas.svg",
            'nombre'  => "Botas",
            'tipo'  => "botas",
            'corde_x' => 70,
            'corde_y' => 345,
        ]);



        $conejo=Animal::create([
            'animal'  => "Conejo",
            'cara'  => "/images/animales/caras/conejo.svg",
            'cuerpo'  => "/images/animales/cuerpo/conejo.svg",
        ]);

        Accesorios::create([
            'animal_id'  => $conejo->id,
            'accesorio'  => "/images/animales/accesorios/conejo/Gorro.svg",
            'nombre'  => "Gorro",
            'tipo'  => "gorro",
            'corde_x' => 47,
            'corde_y' => 137,
        ]);
        Accesorios::create([
            'animal_id'  => $conejo->id,
            'accesorio'  => "/images/animales/accesorios/conejo/Yoyo.svg",
            'nombre'  => "Yoyo",
            'tipo'  => "yoyo",
            'corde_x' => 192,
            'corde_y' => 274,
        ]);
        Accesorios::create([
            'animal_id'  => $conejo->id,
            'accesorio'  => "/images/animales/accesorios/conejo/Gafas.svg",
            'nombre'  => "Gafas",
            'tipo'  => "gafas",
            'corde_x' => 48,
            'corde_y' => 217,
        ]);
        Accesorios::create([
            'animal_id'  => $conejo->id,
            'accesorio'  => "/images/animales/accesorios/conejo/Camisa.svg",
            'nombre'  => "Camisa",
            'tipo'  => "camisa",
            'corde_x' => 21,
            'corde_y' => 264,
        ]);
        Accesorios::create([
            'animal_id'  => $conejo->id,
            'accesorio'  => "/images/animales/accesorios/conejo/Bufanda.svg",
            'nombre'  => "Bufanda",
            'tipo'  => "bufanda",
            'corde_x' => 58,
            'corde_y' => 285,
        ]);
        Accesorios::create([
            'animal_id'  => $conejo->id,
            'accesorio'  => "/images/animales/accesorios/conejo/Botas.svg",
            'nombre'  => "Botas",
            'tipo'  => "botas",
            'corde_x' => 67,
            'corde_y' => 375,
        ]);





        $tigre=Animal::create([
            'animal'  => "Tigre",
            'cara'  => "/images/animales/caras/tigre.svg",
            'cuerpo'  => "/images/animales/cuerpo/tigre.svg",
        ]);


        Accesorios::create([
            'animal_id'  => $tigre->id,
            'accesorio'  => "/images/animales/accesorios/tigre/Gorro.svg",
            'nombre'  => "Gorro",
            'tipo'  => "gorro",
            'corde_x' => 26,
            'corde_y' => 20,
        ]);
        Accesorios::create([
            'animal_id'  => $tigre->id,
            'accesorio'  => "/images/animales/accesorios/tigre/Guitarra.svg",
            'nombre'  => "Guitarra",
            'tipo'  => "guitarra",
            'corde_x' => 45,
            'corde_y' => 185,
        ]);
        Accesorios::create([
            'animal_id'  => $tigre->id,
            'accesorio'  => "/images/animales/accesorios/tigre/Yoyo.svg",
            'nombre'  => "Yoyo",
            'tipo'  => "yoyo",
            'corde_x' => 210,
            'corde_y' => 225,
        ]);
        Accesorios::create([
            'animal_id'  => $tigre->id,
            'accesorio'  => "/images/animales/accesorios/tigre/Gafas.svg",
            'nombre'  => "Gafas",
            'tipo'  => "gafas",
            'corde_x' => 47,
            'corde_y' => 100,
        ]);

        Accesorios::create([
            'animal_id'  => $tigre->id,
            'accesorio'  => "/images/animales/accesorios/tigre/Bufanda.svg",
            'nombre'  => "Bufanda",
            'tipo'  => "bufanda",
            'corde_x' => 58,
            'corde_y' => 285,
        ]);
        Accesorios::create([
            'animal_id'  => $tigre->id,
            'accesorio'  => "/images/animales/accesorios/tigre/Botas.svg",
            'nombre'  => "Botas",
            'tipo'  => "botas",
            'corde_x' => 66,
            'corde_y' => 327,
        ]);
        Accesorios::create([
            'animal_id'  => $tigre->id,
            'accesorio'  => "/images/animales/accesorios/tigre/Camisa.svg",
            'nombre'  => "Camisa",
            'tipo'  => "camisa",
            'corde_x' => 27,
            'corde_y' => 209,
        ]);



        $zorro=Animal::create([
            'animal'  => "Zorro",
            'cara'  => "/images/animales/caras/zorro.svg",
            'cuerpo'  => "/images/animales/cuerpo/zorro.svg",
        ]);
        
        Accesorios::create([
            'animal_id'  => $zorro->id,
            'accesorio'  => "/images/animales/accesorios/zorro/Gorro.svg",
            'nombre'  => "Gorro",
            'tipo'  => "gorro",
            'corde_x' => 21,
            'corde_y' => 46,
        ]);
        Accesorios::create([
            'animal_id'  => $zorro->id,
            'accesorio'  => "/images/animales/accesorios/zorro/Guitarra.svg",
            'nombre'  => "Guitarra",
            'tipo'  => "guitarra",
            'corde_x' => 45,
            'corde_y' => 218,
        ]);
        Accesorios::create([
            'animal_id'  => $zorro->id,
            'accesorio'  => "/images/animales/accesorios/zorro/Yoyo.svg",
            'nombre'  => "Yoyo",
            'tipo'  => "yoyo",
            'corde_x' => 208,
            'corde_y' => 245,
        ]);
        Accesorios::create([
            'animal_id'  => $zorro->id,
            'accesorio'  => "/images/animales/accesorios/zorro/Gafas.svg",
            'nombre'  => "Gafas",
            'tipo'  => "gafas",
            'corde_x' => 52,
            'corde_y' => 142,
        ]);
        Accesorios::create([
            'animal_id'  => $zorro->id,
            'accesorio'  => "/images/animales/accesorios/zorro/Camisa.svg",
            'nombre'  => "Camisa",
            'tipo'  => "camisa",
            'corde_x' => 36,
            'corde_y' => 230,
        ]);
        Accesorios::create([
            'animal_id'  => $zorro->id,
            'accesorio'  => "/images/animales/accesorios/zorro/Bufanda.svg",
            'nombre'  => "Bufanda",
            'tipo'  => "bufanda",
            'corde_x' => 69,
            'corde_y' => 222,
        ]);
        Accesorios::create([
            'animal_id'  => $zorro->id,
            'accesorio'  => "/images/animales/accesorios/zorro/Botas.svg",
            'nombre'  => "Botas",
            'tipo'  => "botas",
            'corde_x' => 76,
            'corde_y' => 350,
        ]);
    }
}
