<?php

class RelacionDocente extends \Eloquent {
	// Add your validation rules here
	public static $rules = [
	];

	// Don't forget to fill this array
	protected $fillable = ['horasacademicas','horasadministrativas','totalhoras','observacion','sede','docente_id','relacion_id'];
	protected $table = 'relaciondocente';
	public $timestamps = false;

	/**
	 * Funcion para trabajar con los postgrados del Docente .
	 * GET /postgrados
	 *
	 * @return Response
	 */
	public function docente()
	{
		return $this->belongsTo('docente');
	}

	/**
	 * Funcion para trabajar con los pregrados del Docente .
	 * GET /postgrados
	 *
	 * @return Response
	 */
	public function relacion()
	{
		return $this->belongsTo('relacion');
	}


	/**
	 * Funcion para trabajar con los pregrados del Docente .
	 * GET /postgrados
	 *
	 * @return Response
	 */
	public function saberDocente()
	{
		return $this->belongsTo('SaberDocente');
	}

	



}