<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          /*
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
*/
            $table->integer('id')->autoIncrement();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('name');
            $table->string('profile_pic', 500);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('id_city');
            $table->longtext('bio');
            $table->integer('id_role');
            $table->string('dni',10);
            $table->date('birthdate');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
