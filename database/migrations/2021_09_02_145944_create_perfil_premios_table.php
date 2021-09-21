<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilPremiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfil_premios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('color',250)->nullable();
            $table->unsignedbigInteger('accesorios_id');
            $table->foreign('accesorios_id')->references('id')->on('accesorios')->onDelete('cascade');
            $table->unsignedbigInteger('perfil_estudiante_user_id');
            $table->foreign('perfil_estudiante_user_id')->references('id')->on('perfil_estudiante_users')->onDelete('cascade');
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
        Schema::dropIfExists('perfil_premios');
    }
}
