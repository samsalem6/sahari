<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToPackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->string('type', 255)->nullable()->after('popular');
            $table->unsignedBigInteger('destination_id')->nullable()->after('popular');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('packages', function (Blueprint $table) {
            //
        });
    }
}
