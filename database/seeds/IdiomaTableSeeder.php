<?php

use Illuminate\Database\Seeder;
use App\Models\Idioma\Idioma;
class IdiomaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Idioma::create([
            'idioma' => "Español",
            'video' => "https://www.youtube.com/embed/GZ7xHi8AIjM",
            'nombreURL' => "spanish",
            'src' => "/img/Banderas/Spain.png",
            'diminutivo' => "es",
        ]);  
        Idioma::create([
            'idioma' => "English",
            'video' => "https://www.youtube.com/embed/GZ7xHi8AIjM",
            'nombreURL' => "english",
            'src' => "/img/Banderas/Inglaterra.png",
            'diminutivo' => "en",
        ]); 
        Idioma::create([
            'idioma' => "Frances",
            'video' => "https://www.youtube.com/embed/GZ7xHi8AIjM",
            'diminutivo' => "fr",
            'src' => "/img/Banderas/Francia.png",
            'nombreURL' => "frances",
        ]);
        Idioma::create([
            'idioma' => "Croata",
            'video' => "https://www.youtube.com/embed/GZ7xHi8AIjM",
            'diminutivo' => "hr",
            'src' => "/img/Banderas/Croacia.png",
            'nombreURL' => "croata",
        ]);  
    }
}
