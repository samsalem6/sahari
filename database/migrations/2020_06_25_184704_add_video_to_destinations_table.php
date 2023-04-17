<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVideoToDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('destinations', function (Blueprint $table) {
            $table->string('type', 255)->nullable()->after('slug');
            $table->string('video', 255)->nullable()->after('slug');
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
