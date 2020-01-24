<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDmFoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dm_folders', function (Blueprint $table) {
            $table->integer('id_folder')->autoIncrement();
            $table->string('folder_name', 50);
            $table->datetime('creation_date')->useCurrent();
            $table->integer('id_document_manager');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dm_folders');
    }
}
