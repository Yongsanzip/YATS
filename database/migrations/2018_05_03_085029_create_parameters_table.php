<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Parameters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key')->nullable(false);
            $table->string('value');
            $table->string('position')->nullable(false);

            $table->integer('api_id')->unsigned();
            $table->foreign('api_id')->references('id')->on('Apis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_parameters');
    }
}
