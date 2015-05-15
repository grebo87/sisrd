<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocenteusuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('docenteusuario', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('docente_id');
			$table->foreign('docente_id')
				  ->references('id')->on('docentes')
				  ->onDelete('cascade')
				  ->onUpdate('cascade');
				  
			$table->integer('usuario_id');
			$table->foreign('usuario_id')
				  ->references('id')->on('usuario')
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
		Schema::drop('docenteusuario');
	}

}
