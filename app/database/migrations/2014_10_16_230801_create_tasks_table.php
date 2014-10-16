<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/**
		 * tablas:
		 * nombre_tabla
		 * --nombres en plural
		 * --tablas para usuario deben llamarse 'users' 
		 * --sus atributos principales deben estar en ingles: 'password', 'email'
		 *
		 * columna id:
		 * id
		 * --debe ser de tipo increments
		 *
		 * claves foraneas:
		 * tabla_atributo
		 * --debe ser unsigned si se asocian a un id
		*/
		Schema::create('tasks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->longText('description');
			$table->boolean('completed')->default(false);
			$table->integer('user_id')->unsigned();
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
		Schema::drop('tasks');
	}

}
