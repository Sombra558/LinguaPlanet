<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Membresia\Membresia;
use Faker\Generator as Faker;

$factory->define(App\Models\Cursos\Curso::class, function (Faker $faker) {
    $namefaker=$faker->text(20);
    $nombreURL=str_replace(' ','-',$namefaker);
    $inicia= $faker->dateTimeBetween('-15 days', '+15 days',null);
    return [
      'titulo' =>  $namefaker,
      'video' => "https://www.youtube.com/watch?v=LiPqYPiC5HQ",
      'nombreURL' =>$nombreURL,
      'descripcion' => $faker->text(200),
      'inicia' =>  $inicia,
    ];
});
