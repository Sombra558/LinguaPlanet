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
   
    /* Route::group(['prefix' => 'app/{id}/{nombreURL}','middleware' => ['HasCourseDocente']], function () {
        Route::get('/', 'Docente\DocenteController@cursoaplicacion');
        Route::get('/clases', 'Docente\DocenteController@cursoaplicacionclases');
        Route::get('/clases/{clase_id}', 'Docente\DocenteController@cursoaplicacionclasesshow');
        Route::get('/clases/{clase_id}/asistencia', 'Docente\DocenteController@cursoclasesasistencia');
        Route::get('/videos-conferencias', 'Docente\DocenteController@videoconferencias');
        Route::get('/asistencia', 'Docente\DocenteController@asistencia');
        Route::get('/asistencia', 'Docente\DocenteController@asistencia');
        Route::get('/matricula', 'Docente\DocenteController@cursoaplicacionmatricula');
        Route::get('/certificado', 'Docente\DocenteController@certificado');
    });*/
 
});
