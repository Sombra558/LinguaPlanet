<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\User;
use App\Models\PerfilEstudiante\PerfilEstudianteUser;
use App\Models\Animals\Animal;
use App\Models\Animals\Avatar;
use App\Models\Animals\Accesorios;
use App\Models\Relaciones\PerfilPremios;
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
            'frase' => 'Frito',
            'email' => 'admin@test.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => Str::random(10),
          ]);
        $Administrador->assignRole('Administrador');
        $Administrador->markEmailAsVerified();
        $user= User::create([
            'name' => 'Lingua',
            'lastname' => 'Padre',
            'frase' => 'Frito',
            'email' => 'padre@test.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => Str::random(10),
          ]);
        $user->assignRole('Padre');
        $user->markEmailAsVerified();
        $perfil = PerfilEstudianteUser::create([
          'apodo' => 'Frito',
          'f_nacimiento' => '2021-09-01',
          'color' => '#000000',
          'hobby' => 'Estres',
          'user_id' => $user->id,
       ]);
       
     

        $this->call(IdiomaTableSeeder::class);
        $this->call(MembresiaTableSeeder::class);
        $this->call(PlanTableSeeder::class);
        $this->call(AnimalsTableSeeder::class);
        $this->call(CursosTableSeeder::class);
        $this->call(MembresiaCursoTableSeeder::class);
        $animal=Animal::find(1);
        $avatar = Avatar::create([
          'animal_id' => 1,
          'cuerpo'  => $animal->cuerpo,
          'cara'  => $animal->cara,
        ]);
  
        $perfil->avatar_id=$avatar->id;
        $perfil->save();
        $accesorios=Accesorios::get();

        foreach($accesorios as $accesorio){
              PerfilPremios::create([
                  'accesorios_id' =>$accesorio->id,
                  'perfil_estudiante_user_id' => $perfil->id,
              ]);
         }

        $this->call(ModuloTableSeeder::class);
        $this->call(ClaseTableSeeder::class);


      }
      


        
}
