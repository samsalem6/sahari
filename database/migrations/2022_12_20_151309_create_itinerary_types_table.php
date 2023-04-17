<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItineraryTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itinerary_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('package_id');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade')->onUpdate('cascade');
            $table->text('title')->nullable();
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
        Schema::dropIfExists('itinerary_types');
    }
}
