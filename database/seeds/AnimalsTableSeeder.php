<?php

use Illuminate\Database\Seeder;
use App\Models\Animals\Animal;
class AnimalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Animal::create([
            'animal'  => "Panda",
            'cara'  => "/images/animales/caras/panda.svg",
        ]);
        Animal::create([
            'animal'  => "Gato",
            'cara'  => "/images/animales/caras/gato.svg",
        ]);
        Animal::create([
            'animal'  => "Perro",
            'cara'  => "/images/animales/caras/perro.svg",
        ]);
        Animal::create([
            'animal'  => "Conejo",
            'cara'  => "/images/animales/caras/conejo.svg",
        ]);
        Animal::create([
            'animal'  => "Tigre",
            'cara'  => "/images/animales/caras/tigre.svg",
        ]);
        Animal::create([
            'animal'  => "Zorro",
            'cara'  => "/images/animales/caras/zorro.svg",
        ]);
     
    }
}
