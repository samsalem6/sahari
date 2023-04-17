<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageToDestinations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('destinations', function (Blueprint $table) {
            $table->string('image')->nullable();
            $table->text('metaTitle')->nullable();
            $table->text('metaKeywords')->nullable();
            $table->text('metaDescription')->nullable();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('destinations', function (Blueprint $table) {
            //
        });
    }
}
