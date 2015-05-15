<?php

class Sabere extends \Eloquent {


	// Don't forget to fill this array

	protected $fillable = ['unidad','horassemanales','departamento_id','carrera','codigo'];
	protected $table='saberes';
	public $timestamps = false;
	
	public static $rules=[	'unidad'                => 'required',
							'horassemanales'        => 'required|numeric',
							'departamento_id'       => 'required',
							'carrera'               => 'required',
							'codigo'                => 'required|unique:saberes,codigo',
						];





/**
	 * Funcion para trabajar con los pregrados del Docente .
	 * GET /postgrados
	 *
	 * @return Response
	 */
	public function saberdocente()
	{
		return $this->hasMany('SaberDocente');
	}
	
}