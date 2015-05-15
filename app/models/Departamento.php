<?php

class Departamento extends \Eloquent {

		// Add your validation rules here
	public static $rules = [
			 'nombre' => 'required|unique:departamentos,nombre'
	];

	// Don't forget to fill this array
	protected $fillable = ['nombre'];
	protected $table='departamentos';
	public $timestamps = false;



	/**
	 * Funcion para trabajar con los pregrados del Docente .
	 * GET /postgrados
	 *
	 * @return Response
	 */
	public function estado()
	{
		return $this->belongsTo('Estadorelacion');

	}


	/**
	 * Funcion para trabajar con los pregrados del Docente .
	 * GET /postgrados
	 *
	 * @return Response
	 */
	public function docentes()
	{
		return $this->hasMany('Docente');
	}

}