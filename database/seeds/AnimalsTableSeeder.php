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
        ]);
        Accesorios::create([
            'animal_id'  => $panda->id,
            'accesorio'  => "/images/animales/accesorios/panda/Guitarra.svg",
            'nombre'  => "Guitarra",
            'tipo'  => "guitarra",
        ]);
        Accesorios::create([
            'animal_id'  => $panda->id,
            'accesorio'  => "/images/animales/accesorios/panda/Yoyo.svg",
            'nombre'  => "Yoyo",
            'tipo'  => "yoyo",
        ]);
        Accesorios::create([
            'animal_id'  => $panda->id,
            'accesorio'  => "/images/animales/accesorios/panda/Gafas.svg",
            'nombre'  => "Gafas",
            'tipo'  => "gafas",
        ]);
        Accesorios::create([
            'animal_id'  => $panda->id,
            'accesorio'  => "/images/animales/accesorios/panda/Camisa.svg",
            'nombre'  => "Camisa",
            'tipo'  => "camisa",
        ]);
        Accesorios::create([
            'animal_id'  => $panda->id,
            'accesorio'  => "/images/animales/accesorios/panda/Bufanda.svg",
            'nombre'  => "Bufanda",
            'tipo'  => "bufanda",
        ]);
        Accesorios::create([
            'animal_id'  => $panda->id,
            'accesorio'  => "/images/animales/accesorios/panda/Botas.svg",
            'nombre'  => "Botas",
            'tipo'  => "botas",
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
        ]);
        Accesorios::create([
            'animal_id'  => $gato->id,
            'accesorio'  => "/images/animales/accesorios/gato/Guitarra.svg",
            'nombre'  => "Guitarra",
            'tipo'  => "guitarra",
        ]);
        Accesorios::create([
            'animal_id'  => $gato->id,
            'accesorio'  => "/images/animales/accesorios/gato/Yoyo.svg",
            'nombre'  => "Yoyo",
            'tipo'  => "yoyo",
        ]);
        Accesorios::create([
            'animal_id'  => $gato->id,
            'accesorio'  => "/images/animales/accesorios/gato/Gafas.svg",
            'nombre'  => "Gafas",
            'tipo'  => "gafas",
        ]);
    
        Accesorios::create([
            'animal_id'  => $gato->id,
            'accesorio'  => "/images/animales/accesorios/gato/Bufanda.svg",
            'nombre'  => "Bufanda",
            'tipo'  => "bufanda",
        ]);
        Accesorios::create([
            'animal_id'  => $gato->id,
            'accesorio'  => "/images/animales/accesorios/gato/Botas.svg",
            'nombre'  => "Botas",
            'tipo'  => "botas",
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
        ]);
        Accesorios::create([
            'animal_id'  => $perro->id,
            'accesorio'  => "/images/animales/accesorios/perro/Guitarra.svg",
            'nombre'  => "Guitarra",
            'tipo'  => "guitarra",
        ]);
        Accesorios::create([
            'animal_id'  => $perro->id,
            'accesorio'  => "/images/animales/accesorios/perro/Yoyo.svg",
            'nombre'  => "Yoyo",
            'tipo'  => "yoyo",
        ]);
        Accesorios::create([
            'animal_id'  => $perro->id,
            'accesorio'  => "/images/animales/accesorios/perro/Gafas.svg",
            'nombre'  => "Gafas",
            'tipo'  => "gafas",
        ]);
        Accesorios::create([
            'animal_id'  => $perro->id,
            'accesorio'  => "/images/animales/accesorios/perro/Camisa.svg",
            'nombre'  => "Camisa",
            'tipo'  => "camisa",
        ]);
        Accesorios::create([
            'animal_id'  => $perro->id,
            'accesorio'  => "/images/animales/accesorios/perro/Bufanda.svg",
            'nombre'  => "Bufanda",
            'tipo'  => "bufanda",
        ]);
        Accesorios::create([
            'animal_id'  => $perro->id,
            'accesorio'  => "/images/animales/accesorios/perro/Botas.svg",
            'nombre'  => "Botas",
            'tipo'  => "botas",
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
        ]);
        Accesorios::create([
            'animal_id'  => $conejo->id,
            'accesorio'  => "/images/animales/accesorios/conejo/Yoyo.svg",
            'nombre'  => "Yoyo",
            'tipo'  => "yoyo",
        ]);
        Accesorios::create([
            'animal_id'  => $conejo->id,
            'accesorio'  => "/images/animales/accesorios/conejo/Gafas.svg",
            'nombre'  => "Gafas",
            'tipo'  => "gafas",
        ]);
        Accesorios::create([
            'animal_id'  => $conejo->id,
            'accesorio'  => "/images/animales/accesorios/conejo/Camisa.svg",
            'nombre'  => "Camisa",
            'tipo'  => "camisa",
        ]);
        Accesorios::create([
            'animal_id'  => $conejo->id,
            'accesorio'  => "/images/animales/accesorios/conejo/Bufanda.svg",
            'nombre'  => "Bufanda",
            'tipo'  => "bufanda",
        ]);
        Accesorios::create([
            'animal_id'  => $conejo->id,
            'accesorio'  => "/images/animales/accesorios/conejo/Botas.svg",
            'nombre'  => "Botas",
            'tipo'  => "botas",
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
        ]);
        Accesorios::create([
            'animal_id'  => $tigre->id,
            'accesorio'  => "/images/animales/accesorios/tigre/Guitarra.svg",
            'nombre'  => "Guitarra",
            'tipo'  => "guitarra",
        ]);
        Accesorios::create([
            'animal_id'  => $tigre->id,
            'accesorio'  => "/images/animales/accesorios/tigre/Yoyo.svg",
            'nombre'  => "Yoyo",
            'tipo'  => "yoyo",
        ]);
        Accesorios::create([
            'animal_id'  => $tigre->id,
            'accesorio'  => "/images/animales/accesorios/tigre/Gafas.svg",
            'nombre'  => "Gafas",
            'tipo'  => "gafas",
        ]);

        Accesorios::create([
            'animal_id'  => $tigre->id,
            'accesorio'  => "/images/animales/accesorios/tigre/Bufanda.svg",
            'nombre'  => "Bufanda",
            'tipo'  => "bufanda",
        ]);
        Accesorios::create([
            'animal_id'  => $tigre->id,
            'accesorio'  => "/images/animales/accesorios/tigre/Botas.svg",
            'nombre'  => "Botas",
            'tipo'  => "botas",
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
        ]);
        Accesorios::create([
            'animal_id'  => $zorro->id,
            'accesorio'  => "/images/animales/accesorios/zorro/Guitarra.svg",
            'nombre'  => "Guitarra",
            'tipo'  => "guitarra",
        ]);
        Accesorios::create([
            'animal_id'  => $zorro->id,
            'accesorio'  => "/images/animales/accesorios/zorro/Yoyo.svg",
            'nombre'  => "Yoyo",
            'tipo'  => "yoyo",
        ]);
        Accesorios::create([
            'animal_id'  => $zorro->id,
            'accesorio'  => "/images/animales/accesorios/zorro/Gafas.svg",
            'nombre'  => "Gafas",
            'tipo'  => "gafas",
        ]);
        Accesorios::create([
            'animal_id'  => $zorro->id,
            'accesorio'  => "/images/animales/accesorios/zorro/Camisa.svg",
            'nombre'  => "Camisa",
            'tipo'  => "camisa",
        ]);
        Accesorios::create([
            'animal_id'  => $zorro->id,
            'accesorio'  => "/images/animales/accesorios/zorro/Bufanda.svg",
            'nombre'  => "Bufanda",
            'tipo'  => "bufanda",
        ]);
        Accesorios::create([
            'animal_id'  => $zorro->id,
            'accesorio'  => "/images/animales/accesorios/zorro/Botas.svg",
            'nombre'  => "Botas",
            'tipo'  => "botas",
        ]);
    }
}
