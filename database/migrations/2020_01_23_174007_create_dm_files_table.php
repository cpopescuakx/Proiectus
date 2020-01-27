<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDmFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dm_files', function (Blueprint $table) {
            $table->integer('id_file')->autoIncrement();
            $table->string('name', 100);
            $table->datetime('last_modification')->useCurrent();
            $table->integer('size');
            $table->string('file_type', 20);
            $table->integer('id_folder');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dm_files');
    }
}
