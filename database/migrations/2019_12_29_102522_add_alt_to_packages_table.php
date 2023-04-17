<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAltToPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->string('altMain')->nullable()->after('mainImage');
            $table->string('altShort')->nullable()->after('shortImage');
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
