<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMapParamToItineriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('itineraries', function (Blueprint $table) {
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('map_title')->nullable();
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
