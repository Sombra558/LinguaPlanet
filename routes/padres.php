<?php

Route::group(['middleware' => ['auth'],'prefix' => 'home'], function () {
    Route::get('/', 'Padres\PadresViewController@home');
    Route::get('/detalles-avances/cursos', 'Padres\PadresViewController@detallespadrecursos');



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



