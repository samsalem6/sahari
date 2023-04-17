<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWikisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wikis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('metaTitle')->nullable();
            $table->text('metaKeywords')->nullable();
            $table->text('metaDescription')->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('image',255)->nullable();
            $table->text('imageAlt')->nullable();
            $table->text('imageTitle')->nullable();
            $table->text('title')->nullable();
            $table->text('Description')->nullable();
            $table->text('shortDescription')->nullable();
            $table->boolean('viewInSite')->default(0);
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
        Schema::dropIfExists('wikis');
    }
}
