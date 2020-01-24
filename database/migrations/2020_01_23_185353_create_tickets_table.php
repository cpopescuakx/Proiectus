<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->integer('id_ticket')->autoIncrement();
            $table->string('topic', 50);
            $table->string('type', 50);
            $table->enum('priority', ['low', 'medium', 'high']);
            $table->datetime('creation_date')->useCurrent();
            $table->datetime('solved_date');
            $table->integer('id_assigned_user');
            $table->integer('id_author');
            $table->enum('status', ['pending', 'in progress', 'resolved'])->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
