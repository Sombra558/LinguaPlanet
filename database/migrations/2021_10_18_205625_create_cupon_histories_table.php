<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuponHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupon_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('precio_pago',8,2);
            $table->unsignedbigInteger('cupon_id');
            $table->foreign('cupon_id')->references('id')->on('cupons')->onDelete('cascade');
            $table->unsignedbigInteger('plan_id');
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
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
        Schema::dropIfExists('cupon_histories');
    }
}
