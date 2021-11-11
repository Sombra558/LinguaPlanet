<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo',250);
            $table->text('video')->nullable();
            $table->text('linkoriginal')->nullable();
            $table->text('img')->nullable();
            $table->text('img_min')->nullable();
            $table->text('nombreURL',350)->nullable();
            $table->date('inicia')->nullable();
            $table->text('descripcion',5000)->nullable();
            $table->boolean('destacados')->default(0);
            $table->boolean('certificado')->default(0);
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
        Schema::dropIfExists('cursos');
    }
}
