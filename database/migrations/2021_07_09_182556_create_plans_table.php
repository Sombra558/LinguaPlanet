<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',120);
            $table->string('nombreURL',120);
            $table->enum('tipo', ['mensual', 'trimestral','anual']);
            $table->double('precio',8,2);
            $table->integer('stock')->default(0);
            $table->unsignedbigInteger('membresia_id');
            $table->foreign('membresia_id')->references('id')->on('membresias')->onDelete('cascade');
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
        Schema::dropIfExists('plans');
    }
}
