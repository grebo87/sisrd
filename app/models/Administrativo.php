<?php

class Administrativo extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];
	protected $table='administrativo';
	public $timestamps = false;


	/**
	 * Funcion para trabajar con los pregrados del Docente .
	 * GET /postgrados
	 *
	 * @return Response
	 */
	public function usuario()
	{
		return $this->belongsTo('Usuario');

	}

}