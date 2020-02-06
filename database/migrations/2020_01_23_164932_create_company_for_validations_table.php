<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyForValidationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_for_validations', function (Blueprint $table) {
            $table->integer('id_company')->autoIncrement();
            $table->string('email', 100);
            $table->string('name', 50);
            $table->string('nif', 10);
            $table->string('address', 100)->nullable();
            $table->string('phone_number', 50)->nullable();
            $table->string('sector', 50);
            $table->integer('id_city')->nullable();
            $table->string('hash', 100);
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
        Schema::dropIfExists('company_for_validations');
    }
}
