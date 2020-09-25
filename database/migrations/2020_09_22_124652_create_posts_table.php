<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('channel_id');
            $table->string('title');
            $table->text('text');
            $table->string('media');
            $table->date('post_time');
            $table->date('published_at');
            $table->foreign('channel_id')->references('id')->on('channels')->onDelete('cascade');
            $table->string('status')->default('WAITING');
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
        Schema::dropIfExists('posts');
    }
}
