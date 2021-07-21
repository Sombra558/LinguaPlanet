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
        Animal::create(['animal'  => "Perro"]);
        Animal::create(['animal'  => "Gato"]);
        Animal::create(['animal'  => "Ardilla"]);
    }
}
