<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->integer('id_school')->autoIncrement();
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('address', 100)->nullable();
            $table->integer('id_city')->nullable();
            $table->integer('phone')->nullable();
            $table->string('type', 100)->nullable();
            $table->string('code', 50);
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
        Schema::dropIfExists('schools');
    }
}
