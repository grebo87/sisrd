<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocentesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('docentes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('primernombre');
			$table->string('segundonombre')->nullable(true);
			$table->string('primerapellido');
			$table->string('segundoapellido')->nullable(true);
			$table->string('cedula',20)->unique();
			$table->string('cargo');
			$table->string('dedicacion');
			$table->string('categoria');
			$table->string('condicion');
			$table->date('fechaingreso');
			$table->string('status');
			$table->string('observacion')->nullable(true);
			$table->string('sede');
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
		Schema::drop('docentes');
	}

}
