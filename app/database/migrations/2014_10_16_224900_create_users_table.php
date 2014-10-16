<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			// Columns
			$table->increments('id');
			$table->string('username');
			$table->string('email');
			$table->string('password');
			$table->timestamps();

			// Indexes
			$table->unique('username');
			$table->unique('email');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		$table->dropUnique('users_username_unique');
		$table->dropUnique('users_email_unique');
		Schema::drop('users');
	}

}
