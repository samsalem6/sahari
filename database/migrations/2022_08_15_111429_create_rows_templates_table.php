<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRowsTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rows_templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name')->nullable();
            $table->text('order')->nullable();
            $table->unsignedBigInteger('pricing_templates_id');
            $table->foreign('pricing_templates_id')->references('id')->on('pricing_templates')->onDelete('cascade')->onUpdate('cascade');
            $table->text('room_type')->nullable();
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
        Schema::dropIfExists('rows_templates');
    }
}
