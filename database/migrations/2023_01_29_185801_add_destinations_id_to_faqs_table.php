<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDestinationsIdToFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('faqs', function (Blueprint $table) {
            $table->boolean('visible')->default(0);
            $table->bigInteger('destination_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faqs', function (Blueprint $table) {
            //
        });
    }
}
