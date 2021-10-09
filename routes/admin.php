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

    //
    Route::get('/cupones', 'AdminController@cupones')->name('.cupones');
    Route::resource('/cupon', 'CuponesController');
    Route::post('/cupon-membresia', 'AdminController@relacioncuponmember')->name('.cupon.relacion');
    Route::delete('/eliminar-relacion-cupon/{id}', 'AdminController@relacioncupondestroy')->name('.cupon.eliminar.relacion');
  });//end admin
