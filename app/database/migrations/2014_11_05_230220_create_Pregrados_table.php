<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePregradosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pregrados', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('pregrado');
			$table->integer('docente_id');
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
		Schema::drop('pregrados');
	}

}
