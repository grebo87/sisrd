<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSaberesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('saberes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('unidad');
			$table->string('horassemanales');
			
			$table->string('carrera');
			$table->string('codigo');
			$table->integer('departamento_id');
			$table->foreign('departamento_id')
				  ->references('id')->on('departamentos')
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
		Schema::drop('saberes');
	}

}
