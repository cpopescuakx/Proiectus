<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolForValidationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_for_validations', function (Blueprint $table) {
            $table->integer('id_school')->autoIncrement();
            $table->integer('id_user');
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('address', 100);
            $table->integer('id_city');
            $table->integer('phone');
            $table->enum('type', ['Batxillerat', 'FP', 'Universitat']);
            $table->string('code', 50);
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
        Schema::dropIfExists('school_for_validations');
    }
}
