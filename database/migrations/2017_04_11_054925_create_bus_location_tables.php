<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusLocationTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userlocation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('busstop', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('userlocation_id');            
            $table->timestamps();
        });
        Schema::create('buses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('busstop_id');            
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
        //
    }
}
