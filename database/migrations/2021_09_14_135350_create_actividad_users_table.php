<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('calificacion',8,2)->nullable();
            $table->integer('intentos')->nullable();
            $table->integer('repeticiones')->nullable();
            $table->unsignedbigInteger('actividad_id');
            $table->foreign('actividad_id')->references('id')->on('actividads')->onDelete('cascade');
            $table->unsignedbigInteger('perfil_id');
            $table->foreign('perfil_id')->references('id')->on('perfil_estudiante_users')->onDelete('cascade');
            $table->boolean('estado')->default(1);
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
        Schema::dropIfExists('actividad_users');
    }
}
