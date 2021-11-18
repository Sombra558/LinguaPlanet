<?php
Route::get('/','Pages\LandingController@Inicio')->name('Inicio');
Route::get('/cursos','Pages\LandingController@Cursos')->name('Cursos');
Route::get('/cursos/{nombreURL}','Pages\LandingController@CursosShow')->name('courses.show');
Route::get('/membresia/{nombreURL}','Pages\LandingController@MembresiaShow')->name('Membresias-Show');
Route::get('/comprar/plan/{id}/{nombreURL}','Pages\LandingController@Payment')->middleware(['auth'])->name('comprar');
Route::post('/paypal-payments', 'PaypalController@pay')->middleware(['auth'])->name('paypal-payment');
Route::get('/payments/approval', 'PaypalController@approval')->middleware(['auth'])->name('approval');
Route::get('/payments/cancelled', 'PaypalController@cancelled')->middleware(['auth'])->name('cancelled');
Route::get('lang/change', 'LangController@change')->name('changeLang');
Auth::routes();
Route::view('/confirmado', 'landing.Comprar.Completado', [
	'transactionId' => '12345678910'
]);
Route::get('/aplicar-cupon/{cupon}/{plan}/{membresia}', 'PaypalController@cupon')->middleware(['auth'])->name('cupon');
Route::post('/stripe-payments', 'StripeController@pay')->middleware(['auth'])->name('stripe-payment');
Route::get('/stripe-payments/approval', 'StripeController@approval')->middleware(['auth'])->name('stripe-approval');
Route::get('/stripe-payments/cancelled', 'StripeController@cancelled')->middleware(['auth'])->name('stripe-cancelled');
