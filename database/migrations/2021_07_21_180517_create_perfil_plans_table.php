<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfil_estudiante_user_plan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('plan_user_id');
            $table->foreign('plan_user_id')->references('id')->on('plan_user')->onDelete('cascade');
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
        Schema::dropIfExists('perfil_plans');
    }
}
