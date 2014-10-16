<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToTasks extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tasks', function(Blueprint $table)
		{
			/**
			 * clave foranea:
			 * tabla_columna
			*/
			$table->foreign('user_id')
			      ->references('id')->on('users')
			      ->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tasks', function(Blueprint $table)
		{
			/**
			 * Convencion:
			 * tablaOrigen_tablaDestino_atributo_foreign
			*/
			$table->dropForeign('tasks_user_id_foreign');
		});
	}

}
