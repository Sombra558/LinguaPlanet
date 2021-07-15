<?php

use Illuminate\Database\Seeder;

class MembresiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Membresia\Membresia::class, 20)->create();
    }
}
