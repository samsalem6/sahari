<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('metaTitle')->nullable();
            $table->text('metaKeywords')->nullable();
            $table->text('metaDescription')->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('mainImage', 255)->nullable();
            $table->string('shortImage', 255)->nullable();
            $table->string('name', 255)->nullable();
            $table->string('stars', 255)->nullable();
            $table->integer('starsNum')->nullable();
            $table->string('startPrice', 255)->nullable();
            $table->longText('description')->nullable();
            $table->longText('itinerary')->nullable();
            $table->longText('price')->nullable();
            $table->string('popular', 255)->nullable();
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
        Schema::dropIfExists('packages');
    }
}
