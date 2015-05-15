<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRelacionDocenteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('relaciondocente', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('horasacademicas');
			$table->integer('horasadministrativas');
			$table->integer('totalhoras');
			$table->string('observacion');
			$table->string('sede');
			$table->integer('docente_id');
			$table->integer('relacion_id');
			$table->foreign('relacion_id')
				  ->references('id')->on('relacion')
				  ->onDelete('cascade')
				  ->onUpdate('cascade');
			$table->foreign('docente_id')
				  ->references('id')->on('docentes')
				  ->onDelete('cascade')
				  ->onUpdate('cascade');			

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('relaciondocente');
	}
}