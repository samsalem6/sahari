<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelatedWikisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('related_wikis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('wiki_id');
            $table->foreign('wiki_id')->references('id')->on('wikis')->onDelete('cascade')->onUpdate('cascade');
            $table->string('Package_id')->nullable();
            $table->integer('order')->nullable();
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
        Schema::dropIfExists('related_wikis');
    }
}
