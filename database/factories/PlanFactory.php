<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Membresia\Membresia;
use Faker\Generator as Faker;

$factory->define(App\Models\Membresia\Plan::class, function (Faker $faker) {
    $membresias=Membresia::all();
    $namefaker=$faker->text(15);
    $nombreURL=str_replace(' ','-',$namefaker);
    $tipos= collect([
        'trimestral', 'mensual',
        'anual',
      ]);
    return [
      'nombre' =>  $namefaker,
      'nombreURL' =>$nombreURL,
      'precio' => $faker->randomFloat(2, 10, 1000),
      'stock' => $faker->randomNumber(2, false),
      'membresia_id' => $membresias->random()->id,
      'tipo' => $tipos->random(),
    ];
});
