<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccesoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accesorios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('animal_id');
            $table->foreign('animal_id')->references('id')->on('animals')->onDelete('cascade');
            $table->enum('tipo', ['gorro', 'camisa','yoyo','bufanda','guitarra','botas','gafas']);
            $table->string('accesorio')->nullable();
            $table->string('nombre')->nullable();
            $table->integer('corde_x')->nullable();
            $table->integer('corde_y')->nullable();
            $table->integer('available')->nullable();
            $table->boolean('estados')->default(0);
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
        Schema::dropIfExists('accesorios');
    }
}
