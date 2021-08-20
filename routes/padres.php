<?php

Route::group(['middleware' => ['auth'],'prefix' => 'home'], function () {
Route::get('/', 'Padres\PadresViewController@home')->name('home');

Route::get('/detalles-avances/cursos', 'Padres\PadresViewController@detallespadrecursos');
Route::get('/detalles-avances/progreso', 'Padres\PadresViewController@detallesProgreso')->name('padre.pagos');
Route::get('/detalles-avance-individual/cursos', 'Padres\PadresViewController@detalleIndividualpadrecursos');
Route::get('/detalles-pagos/membresias', 'Padres\PadresViewController@detallespadremembresias')->name('padre.pagos');
Route::get('/membresia/{plan_id}/editar', 'Padres\PadresViewController@editarMembresia')->name('padre.editarMembresia');
Route::get('/certificados', 'Padres\PadresViewController@certificados');
Route::get('/perfil', 'Padres\PadresViewController@perfil')->name('padre.perfil');
Route::post('/actualizar-perfil/{id}', 'Padres\PerfilController@update')->name('update-perfil');
Route::post('/actualizar-password', 'Padres\PerfilController@updatecontrasena');

Route::resource('/perfil-user', 'Padres\PerfilEstudiante');
Route::post('/asignar-plan', 'Padres\PerfilEstudiante@asignarplan');
   
     Route::group(['prefix' => 'app/{id}/{apodo}','middleware' => ['HasPerfilPadre']], function () {
        Route::get('/', 'Padres\PerfilEstudiante@previewshow');
        Route::get('/idiomas', 'Padres\PerfilEstudiante@show');
        Route::get('/idiomas/{nombreURL}', 'Padres\PerfilEstudiante@aplication');
        Route::get('/idiomas/{nombreURL}/{curso_id}', 'Padres\PerfilEstudiante@aplicationCurso');
      
    });
 
});
