<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image',255)->nullable();
            $table->text('imageAlt')->nullable();
            $table->text('imageTitle')->nullable();
            $table->text('title')->nullable();
            $table->text('Description')->nullable();
            $table->integer('order')->nullable();
            $table->unsignedBigInteger('blog_id');
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('blog_lists');
    }
}
