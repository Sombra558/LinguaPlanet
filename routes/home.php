<?php
Route::get('/','Pages\LandingController@Inicio')->name('Inicio');
Route::get('/cursos','Pages\LandingController@Cursos')->name('Cursos');
Route::get('/cursos/{nombreURL}','Pages\LandingController@CursosShow')->name('Cursos-Show');
Route::get('/membresia/{nombreURL}','Pages\LandingController@MembresiaShow')->name('Membresias-Show');
Route::get('/comprar/plan/{nombreURL}','Pages\LandingController@Payment')->middleware(['auth'])->name('comprar');
Route::post('/paypal-payments', 'PaypalController@pay')->middleware(['auth'])->name('paypal-payment');
Route::get('/payments/approval', 'PaypalController@approval')->middleware(['auth'])->name('approval');
Route::get('/payments/cancelled', 'PaypalController@cancelled')->middleware(['auth'])->name('cancelled');

Route::get('lang/change', 'LangController@change')->name('changeLang');
Auth::routes();


