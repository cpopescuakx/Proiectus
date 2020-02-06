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
      
            $table->integer('id_post')->autoIncrement();
            $table->integer('id_project');
            $table->string('title', 50);
            $table->longText('content');
            $table->datetime('creation_date')->useCurrent();
            $table->integer('id_user');
            $table->enum('status', ['active', 'inactive'])->default('active');


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
