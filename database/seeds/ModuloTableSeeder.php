<?php

use Illuminate\Database\Seeder;

class ModuloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Cursos\Modulo::class, 20)->create();
    }
}
