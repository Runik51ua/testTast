<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->string('Name')->primary()->nullable(false);
            $table->integer('Price')->nullable(false);
            $table->integer('Bedrooms')->nullable(false);
            $table->integer('Bathrooms')->nullable(false);
            $table->integer('Storeys')->nullable(false);
            $table->integer('Garages')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('houses');
    }
}
