<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->integer('id_proposal')->autoIncrement();
            $table->string('name', 100);
            $table->string('professional_family', 100);
            $table->longText('description');
            $table->datetime('limit_date');
            $table->integer('id_author');
            $table->enum('category', ['user', 'school']);
            $table->enum('status', ['active', 'inactive', 'deleted'])->default('active');
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
        Schema::dropIfExists('proposals');
    }
}
