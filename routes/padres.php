<?php

Route::group(['middleware' => ['auth'],'prefix' => 'home'], function () {
    Route::get('/', 'Padres\PadresViewController@home');
    Route::get('/detalles-avances/cursos', 'Padres\PadresViewController@detallespadrecursos');
    Route::get('/detalles-pagos/membresias', 'Padres\PadresViewController@detallespadremembresias');
    Route::get('/perfil', 'Padres\PadresViewController@perfil');
    Route::post('/actualizar-perfil/{id}', 'Padres\PerfilController@update')->name('update-perfil');
    Route::post('/actualizar-password', 'Padres\PerfilController@updatecontrasena');
    Route::resource('/perfil-user', 'Padres\PerfilEstudiante');
    Route::group(['prefix' => 'app/{id}/{apodo}','middleware' => ['HasPerfilPadre']], function () {
        Route::get('/', 'Padres\PerfilEstudiante@previewshow');
        Route::get('/idiomas', 'Padres\PerfilEstudiante@show');
        Route::get('/idiomas/{nombreURL}', 'Padres\PerfilEstudiante@aplication');
        Route::get('/idiomas/{nombreURL}/{curso_id}', 'Padres\PerfilEstudiante@aplicationCurso');
    });
});
