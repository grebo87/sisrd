<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRelacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('relacion', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('lapso', 5);
			$table->string('fechalapso', 5);
			$table->string('trimestre', 5);
			$table->string('fechatrimestre', 5);
			$table->string('estado', 10);
			$table->date('fechainicio');
			$table->date ('fechafinal');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('relacion');
	}

}
