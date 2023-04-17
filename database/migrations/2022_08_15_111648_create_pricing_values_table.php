<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricingValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricing_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('value')->nullable();
            $table->unsignedBigInteger('rows_templates_id');
            $table->foreign('rows_templates_id')->references('id')->on('rows_templates')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('columns_templates_id');
            $table->foreign('columns_templates_id')->references('id')->on('columns_templates')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('pricing_templates_packages_id');
            $table->foreign('pricing_templates_packages_id')->references('id')->on('pricing_templates_packages')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('pricing_values');
    }
}
