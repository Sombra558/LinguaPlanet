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
            'idioma' => "Español Mx",
            'video' => "https://www.youtube.com/embed/b38oTgeNEos",
            'nombreURL' => "mexicano",
            'src' => "/img/Banderas/mx.svg",
            'diminutivo' => "mx",
        ]); 
        Idioma::create([
            'idioma' => "Español Arg",
            'video' => "https://www.youtube.com/embed/b38oTgeNEos",
            'nombreURL' => "argentino",
            'src' => "/img/Banderas/argentina.svg",
            'diminutivo' => "arg",
        ]);   
        Idioma::create([
            'idioma' => "English",
            'video' => "https://www.youtube.com/embed/b38oTgeNEos",
            'nombreURL' => "english",
            'src' => "/img/Banderas/usa.svg",
            'diminutivo' => "en",
        ]); 
        Idioma::create([
            'idioma' => "Suiza",
            'video' => "https://www.youtube.com/embed/b38oTgeNEos",
            'diminutivo' => "ch",
            'src' => "/img/Banderas/suiza.svg",
            'nombreURL' => "Suiza",
        ]);
        Idioma::create([
            'idioma' => "Croata",
            'video' => "https://www.youtube.com/embed/b38oTgeNEos",
            'diminutivo' => "hr",
            'src' => "/img/Banderas/croacia.svg",
            'nombreURL' => "croata",
        ]);  
    }
}
