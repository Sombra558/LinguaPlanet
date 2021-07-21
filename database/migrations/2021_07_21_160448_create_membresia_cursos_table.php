<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembresiaCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_membresia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('membresia_id');
            $table->foreign('membresia_id')->references('id')->on('membresias')->onDelete('cascade');
            $table->unsignedbigInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
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
        Schema::dropIfExists('membresia_cursos');
    }
}
