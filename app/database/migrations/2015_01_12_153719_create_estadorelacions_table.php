<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEstadorelacionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estadorelacion', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('estado');
			$table->integer('departamento_id');
			$table->foreign('departamento_id')
				  ->references('id')->on('departamentos')
				  ->onDelete('cascade')
				  ->onUpdate('cascade');
			$table->integer('relacion_id');
			$table->foreign('relacion_id')
				  ->references('id')->on('relacion')
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
		Schema::drop('estadorelacion');
	}

}
