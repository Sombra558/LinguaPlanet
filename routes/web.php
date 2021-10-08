<?php

require __DIR__ . '/home.php';
require __DIR__ . '/padres.php';
require __DIR__ . '/admin.php';

Route::get('/courses', 'Pages\LandingController@cursos')->name('courses.index');


