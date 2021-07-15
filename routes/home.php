<?php
Route::get('/','Pages\LandingController@Inicio')->name('Inicio');
Route::get('/cursos','Pages\LandingController@Cursos')->name('Cursos');
Route::get('/cursos/{nombreURL}','Pages\LandingController@CursosShow')->name('Cursos-Show');
Route::get('/membresia/{nombreURL}','Pages\LandingController@MembresiaShow')->name('Membresias-Show');
Route::get('/comprar/plan/{nombreURL}','Pages\LandingController@Payment')->middleware(['auth'])->name('comprar');

