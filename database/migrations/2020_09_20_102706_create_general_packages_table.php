<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('general_id');
            $table->foreign('general_id')->references('id')->on('generals')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('package_id');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('general_packages');
    }
}
