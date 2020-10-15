<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectorDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collector_details', function (Blueprint $table) {
            $table->id();
            $table->integer('recycling_point_id');
            $table->integer('collector_id');
            $table->foreign('recycling_point_id')->references('id')->on('recycling_points');
            $table->foreign('collector_id')->references('id')->on('collectors');
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
        Schema::dropIfExists('collector_details');
    }
}
