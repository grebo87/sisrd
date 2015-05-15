<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaberdocente extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('saberdocente', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('sabere_id');
			$table->foreign('sabere_id')
				  ->references('id')->on('saberes')->onDelete('cascade')->onUpdate('cascade');
			
			$table->integer('numerosecciones');

			$table->integer('docente_id');
			$table->foreign('docente_id')->references('id')->on('docentes')->onDelete('cascade')->onUpdate('cascade');

			$table->integer('relaciondocente_id');
			$table->foreign('relaciondocente_id')->references('id')->on('relaciondocente')->onDelete('cascade')->onUpdate('cascade');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('saberdocente');
	}

}
