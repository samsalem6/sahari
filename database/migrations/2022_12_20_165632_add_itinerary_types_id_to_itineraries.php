<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddItineraryTypesIdToItineraries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('itineraries', function (Blueprint $table) {
            $table->unsignedBigInteger('itinerary_types_id');
            $table->foreign('itinerary_types_id')->references('id')->on('itinerary_types')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('itineraries', function (Blueprint $table) {
            //
        });
    }
}
