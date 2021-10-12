<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembresiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membresias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',120);
            $table->string('nombreURL',120);
            $table->enum('tipo', ['mensual', 'trimestral','anual']);
            $table->dateTime('inicia')->nullable();
            $table->dateTime('finaliza')->nullable();
            $table->unsignedbigInteger('idioma_id');
            $table->foreign('idioma_id')->references('id')->on('idiomas')->onDelete('cascade');
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
        Schema::dropIfExists('membresias');
    }
}
