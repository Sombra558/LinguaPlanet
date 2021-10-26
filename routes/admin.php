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
    Route::delete('/eliminar-relacion/{id}', 'AdminController@relaciondestroy')->name('.cursos.eliminar.relacion');

    //cupones
    Route::get('/cupones', 'AdminController@cupones')->name('.cupones');
    Route::resource('/cupon', 'CuponesController');
    Route::post('/cupon-membresia', 'AdminController@relacioncuponmember')->name('.cupon.relacion');
    Route::delete('/eliminar-relacion-cupon/{id}', 'AdminController@relacioncupondestroy')->name('.cupon.eliminar.relacion');


    //membresias
    Route::get('/membresias', 'AdminController@membresias')->name('.membresias');
    Route::resource('/membresia', 'MembresiasController');

    //Usuarios
    Route::get('/usuarios', 'AdminController@usuarios')->name('.usuarios');

    Route::get('/buscar-usuario/{query}', 'UserController@buscarUsuario');
    Route::get('/valida-usuario/{email}', 'UserController@validaUsuario');
    Route::post('/crear-usuario', 'UserController@crearUsuario');
    Route::delete('/userdelete/{id}','UserController@destroy');

    Route::resource('/plan-user', 'PlanUserController');

    //configuraciones
    Route::get('/configuraciones', 'AdminController@configuraciones')->name('.configuraciones');
    Route::resource('/plan', 'PlanController');

    //reportes
    Route::get('/reportes', 'AdminController@reportes')->name('.reportes');

    //reportes secciones
    Route::get('/reportes-padres', 'AdminController@reportesPadre')->name('.reportes.padres');
    Route::get('/reportes-alumnos', 'AdminController@reportesAlumnos')->name('.reportes.alumnos');
    Route::get('/reportes-calificaciones', 'AdminController@reportesCalificaciones')->name('.reportes.calificaciones');
    Route::get('/reportes-ventas', 'AdminController@reportesVentas')->name('.reportes.ventas');
    Route::get('/reportes-cupones', 'AdminController@reportesCupones')->name('.reportes.cupones');

  });//end admin
