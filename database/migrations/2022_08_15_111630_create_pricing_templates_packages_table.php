<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricingTemplatesPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricing_templates_packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order')->nullable();
            $table->text('caption')->nullable();
            $table->boolean('show_caption')->default(0)->nullable();
            $table->text('accommodation')->nullable();
            $table->unsignedBigInteger('pricing_templates_id');
            $table->foreign('pricing_templates_id')->references('id')->on('pricing_templates')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('package_id');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade')->onUpdate('cascade');
            $table->string('hotels')->nullable();
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
        Schema::dropIfExists('pricing_templates_packages');
    }
}
