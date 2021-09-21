<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgresoCursoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progreso_curso_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('progreso',8,2)->nullable();
            $table->unsignedbigInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->unsignedbigInteger('perfil_id');
            $table->foreign('perfil_id')->references('id')->on('perfil_estudiante_users')->onDelete('cascade');
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
        Schema::dropIfExists('progreso_curso_users');
    }
}