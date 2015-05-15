<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdministrativosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('administrativo', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('primernombre');
			$table->string('segundonombre')->nullable(true);
			$table->string('primerapellido');
			$table->string('segundoapellido')->nullable(true);
			$table->string('cedula',20)->unique();
			$table->string('cargo');
			$table->string('observacion')->nullable(true);
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
		Schema::drop('administrativo');
	}

}

