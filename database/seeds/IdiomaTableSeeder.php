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
            'nombreURL' => "espanol",
            'diminutivo' => "es",
        ]);  
        Idioma::create([
            'idioma' => "English",
            'video' => "https://www.youtube.com/embed/GZ7xHi8AIjM",
            'nombreURL' => "english",
            'diminutivo' => "en",
        ]); 
        Idioma::create([
            'idioma' => "Frances",
            'video' => "https://www.youtube.com/embed/GZ7xHi8AIjM",
            'diminutivo' => "fr",
            'nombreURL' => "frances",
        ]);
        Idioma::create([
            'idioma' => "Croata",
            'video' => "https://www.youtube.com/embed/GZ7xHi8AIjM",
            'diminutivo' => "hr",
            'nombreURL' => "croata",
        ]);  
    }
}
