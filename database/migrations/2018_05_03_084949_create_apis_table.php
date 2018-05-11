<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Apis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable(false);
            $table->longText('desc');
            $table->string('http_method')->nullable(false);

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('Categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_apis');
    }
}
