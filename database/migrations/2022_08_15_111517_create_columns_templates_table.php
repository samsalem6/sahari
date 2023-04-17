<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnsTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('columns_templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name')->nullable();
            $table->text('order')->nullable();
            $table->unsignedBigInteger('pricing_templates_id');
            $table->foreign('pricing_templates_id')->references('id')->on('pricing_templates')->onDelete('cascade')->onUpdate('cascade');
            $table->text('min_adult')->nullable();
            $table->text('max_adult')->nullable();
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
        Schema::dropIfExists('columns_templates');
    }
}
