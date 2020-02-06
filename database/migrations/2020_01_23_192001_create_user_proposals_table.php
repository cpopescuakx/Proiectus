<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_proposals', function (Blueprint $table) {
            $table->integer('id_user_prop')->autoIncrement();
            $table->integer('id_user');
            $table->integer('id_proposal');
            $table->datetime('publication_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_proposals');
    }
}
