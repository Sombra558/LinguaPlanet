<?php
Route::get('/','Pages\LandingController@Inicio')->name('Inicio');
Route::get('/cursos','Pages\LandingController@Cursos')->name('Cursos');
Route::get('/cursos/{nombreURL}','Pages\LandingController@CursosShow')->name('Cursos-Show');
