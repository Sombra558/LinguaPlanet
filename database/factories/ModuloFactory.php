<?php

use App\Models\Cursos\Curso;
use Faker\Generator as Faker;

$factory->define(App\Models\Cursos\Modulo::class, function (Faker $faker) {
    $cursos=Curso::get();
    $namefaker=$faker->text(20);
    $nombreURL=str_replace(' ','-',$namefaker);
    $inicia= $faker->dateTimeBetween('0 days', '+30 days',null);
    return [
      'nombre' =>  $namefaker,
      'curso_id' => $cursos->random()->id,
      'descripcion' => $faker->text(200),
      'inicia' =>  $inicia,
    ];
});
