<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasePremiosTable extends Migration
{
    public function up()
    {
        Schema::create('clase_premios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('accesorio_id');
            $table->foreign('accesorio_id')->references('id')->on('accesorios')->onDelete('cascade');
            $table->unsignedbigInteger('clase_id');
            $table->foreign('clase_id')->references('id')->on('clases')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clase_premios');
    }
}
