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
            $table->text('title');
            $table->longText('description');
            $table->string('main_image',355);
            $table->string('other_image',355);
            $table->text('tag')->comment('There will be some tag of post');
            $table->integer('user_id')->nullable();
            $table->integer('category_id');
            $table->integer('comment_id');
            $table->integer('status')->comment('1 = Active, 2 = Inactive')->default(2);
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
