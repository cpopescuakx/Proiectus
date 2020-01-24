<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_messages', function (Blueprint $table) {
            $table->integer('id_message')->autoIncrement();
            $table->integer('id_user');
            $table->integer('receiver');
            $table->string('subject', 200);
            $table->longText('content');
            $table->datetime('datetime')->useCurrent();
            $table->enum('status_sender', ['visible', 'trash', 'removed'])->default('visible');
            $table->enum('status_receiver', ['read', 'unread', 'tresh', 'removed'])->default('unread');
            $table->enum('favorite', ['no', 'yes'])->default('no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mail_messages');
    }
}
