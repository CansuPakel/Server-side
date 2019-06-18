<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('users', function (Blueprint $table) {
			$table->integer('id')->unsigned()->autoIncrement();
			$table->string('firstname');
			$table->string('lastname');
			$table->string('email')->unique();
			$table->enum('gender', ['male','female']);
			$table->string('phonenumber');
			$table->string('address');
			$table->string('zipcode');
			$table->string('password');
			$table->enum('role', ['admin','user']);
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
