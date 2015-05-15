<?php

class Estadorelacion extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['estado','departamento_id','relacion_id'];

	protected $table = 'estadorelacion';
	public $timestamps = false;


		

	/**
	 * Funcion para trabajar con los pregrados del Docente .
	 * GET /postgrados
	 *
	 * @return Response
	 */
	public function departamento()
	{
		return $this->hasMany('Departamento');
	}

	/**
	 * Funcion para trabajar con los pregrados del Docente .
	 * GET /postgrados
	 *
	 * @return Response
	 */
	public function relacion()
	{
		return $this->belongsTo('Relacion');

	}

}