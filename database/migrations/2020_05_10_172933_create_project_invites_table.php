<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectInvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_invites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_project');
            $table->integer('invited_by');
            $table->string('email');
            $table->string('token', 32)->unique();
            $table->timestamps();
            $table->unique(['id_project', 'email']);
        });
      }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_invites');
    }
}
