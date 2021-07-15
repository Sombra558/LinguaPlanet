<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $Administrador= User::create([
            'name' => 'Lingua',
            'lastname' => 'Planet',
            'email' => 'admin@test.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => Str::random(10),
          ]);
        $Administrador->assignRole('Administrador');
        $Administrador->markEmailAsVerified();
        $user= User::create([
            'name' => 'Lingua',
            'lastname' => 'Padre',
            'email' => 'padre@test.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => Str::random(10),
          ]);
        $user->assignRole('Padre');
        $user->markEmailAsVerified();
        $this->call(IdiomaTableSeeder::class);
        $this->call(MembresiaTableSeeder::class);
        $this->call(PlanTableSeeder::class);
    }
}
