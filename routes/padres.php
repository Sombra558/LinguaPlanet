<?php

Route::group(['middleware' => ['auth'],'prefix' => 'home'], function () {
	Route::get('/', 'Padres\PadresViewController@home')->name('home');

	Route::get('/detalles-avances/cursos', 'Padres\PadresViewController@detallespadrecursos')->name('padre.detalles-avances');
	Route::get('/detalles-avances/progreso', 'Padres\PadresViewController@detallesProgreso')->name('padre.pagos');
	Route::get('/detalles-avance-individual/cursos/{id}', 'Padres\PadresViewController@detalleIndividualpadrecursos')->name('padre.detalles-individual');;
	Route::get('/detalles-pagos/membresias', 'Padres\PadresViewController@detallespadremembresias')->name('padre.pagos');
	Route::get('/membresia/{plan_id}/editar', 'Padres\PadresViewController@editarMembresia')->name('padre.editarMembresia');
	Route::get('/certificados', 'Padres\PadresViewController@certificados')->name('padre.certificados');
	Route::get('/perfil', 'Padres\PadresViewController@perfil')->name('padre.perfil');
	Route::post('/actualizar-perfil/{id}', 'Padres\PerfilController@update')->name('update-perfil');
	Route::post('/actualizar-password', 'Padres\PerfilController@updatecontrasena');
	Route::post('/actualizar-avatar/{id}', 'Padres\PerfilEstudiante@guardaravatar')->name('update-avatar');
	Route::post('/perfil-user/{id}', 'Padres\PerfilEstudiante@updateperfil');
	Route::post('/asignar-plan', 'Padres\PerfilEstudiante@asignarplan');

	Route::resource('/perfil-user', 'Padres\PerfilEstudiante');
	   
	Route::group([ 'prefix' => 'app/{id}/{apodo}', 'middleware' => ['HasPerfilPadre'] ], function() {
	    Route::get('/', 'Padres\PerfilEstudiante@previewshow')->name('student.home');
	    Route::get('/idiomas', 'Padres\PerfilEstudiante@show');
	    Route::get('/premios', 'Padres\PerfilEstudiante@premios')->name('student.premios');
	    Route::get('/armario', 'Padres\PerfilEstudiante@armario')->name('student.armario');
	    Route::get('/idiomas/{nombreURL}', 'Padres\PerfilEstudiante@aplication');
		Route::get('/curso/{curso_id}/clase/{clase_id}/actividad/{actividad_id}/realizada', 'Padres\PerfilEstudiante@actividadrealizada')->name('student.actividad.realizada');
	    Route::get('/idiomas/{nombreURL}/{curso_id}', 'Padres\PerfilEstudiante@aplicationCurso')->name('student.activities');
		Route::group([ 'prefix' => '/idiomas/{nombreURL}/{curso_id}/clase/{clase_id}/actividad/{actividad_id}'], function() {
			Route::get('/', 'Padres\PerfilEstudiante@veractividad')->name('student.actividad');
			
		});
	});
 
});