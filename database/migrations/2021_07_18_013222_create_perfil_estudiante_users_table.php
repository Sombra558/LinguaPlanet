<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilEstudianteUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfil_estudiante_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hobby');
            $table->string('apodo',20);
            $table->string('color',20);
            $table->date('f_nacimiento')->nullable();
            $table->unsignedbigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedbigInteger('avatar_id')->nullable();
            $table->foreign('avatar_id')->references('id')->on('avatars')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfil_estudiante_users');
    }
}
