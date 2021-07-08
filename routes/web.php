<?php

require __DIR__ . '/home.php';


Route::get('lang/change', 'LangController@change')->name('changeLang');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

