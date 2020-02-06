<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->integer('id_project')->autoIncrement();
            $table->string('name', 50);
            $table->datetime('initial_date')->useCurrent();
            $table->datetime('ending_date');
            $table->integer('budget');
            $table->longText('description');
            $table->string('professional_family', 50);
            $table->enum('status', ['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('projects');
    }
}
