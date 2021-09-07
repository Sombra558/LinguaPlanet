<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvatarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avatars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('animal_id');
            $table->foreign('animal_id')->references('id')->on('animals')->onDelete('cascade');
            $table->string('cara')->nullable();
            $table->string('cuerpo')->nullable();
            $table->text('gorro')->nullable();
            $table->text('gafas')->nullable();
            $table->text('camisa')->nullable();
            $table->text('botas')->nullable();
            $table->text('bufanda')->nullable();
            $table->text('yoyo')->nullable();
            $table->text('guitarra')->nullable();

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
        Schema::dropIfExists('avatars');
    }
}
