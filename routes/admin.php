<?php
Route::namespace('Admin')->prefix('admin')->name('admin.')
  ->middleware(['auth','StudenAndOthersRole'])
  ->group(function () {
    Route::get('/', 'AdminController@home')->name('.home');
    Route::get('/cursos', 'AdminController@cursos')->name('.cursos');
    Route::resource('/curso', 'CursoController');
    Route::resource('/modulo', 'ModuloController');
    Route::resource('/clase', 'ClaseController');
    Route::resource('/actividad', 'ActividadController');
    Route::post('/relacion', 'AdminController@relacioncursomember')->name('.cursos.relacion');
   
  });//end admin
