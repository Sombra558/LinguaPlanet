<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Idioma\Idioma;
use Faker\Generator as Faker;

$factory->define(App\Models\Membresia\Membresia::class, function (Faker $faker) {
    $idiomas=Idioma::all();
    $namefaker=$faker->text(15);
    $nombreURL=str_replace(' ','-',$namefaker);
    $tipos= collect([
        'trimestral', 'mensual',
        'anual',
      ]);
      $daysToAdd= $faker->randomDigit;
      $inicia= $faker->dateTimeBetween('-15 days', '+15 days',null);
      $finaliza= $inicia->add(new DateInterval("P{$daysToAdd}D"));
    return [
      'nombre' => $namefaker,
      'nombreURL' => $nombreURL,
      'inicia' => $inicia,
      'finaliza' => $finaliza,
      'idioma_id' => $idiomas->random()->id,
      'tipo' => $tipos->random(),
    ];
});
