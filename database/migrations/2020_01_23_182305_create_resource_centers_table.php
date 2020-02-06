<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourceCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_centers', function (Blueprint $table) {
            $table->integer('id_file')->autoIncrement();
            $table->string('f_name', 150);
            $table->string('f_ext', 10);
            $table->string('f_route', 500);
            $table->integer('f_weight');
            $table->integer('id_project');
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
        Schema::dropIfExists('resource_centers');
    }
}
