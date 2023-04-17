<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWikiListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wiki_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image',255)->nullable();
            $table->text('imageAlt')->nullable();
            $table->text('imageTitle')->nullable();
            $table->text('title')->nullable();
            $table->text('Description')->nullable();
            $table->integer('order')->nullable();
            $table->unsignedBigInteger('wiki_id');
            $table->foreign('wiki_id')->references('id')->on('wikis')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('wiki_lists');
    }
}
