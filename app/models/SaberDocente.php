<?php

class SaberDocente extends \Eloquent {
	protected $fillable = ['numerosecciones','sabere_id','docente_id','relaciondocente_id'];
	protected $table='saberdocente';
	public $timestamps = false;






	public function docente()
	{
		return $this->belongsTo('Docente');

	}

	public function saber()
	{
		return $this->belongsTo('Sabere','sabere_id');

	}

	public function relaciondocente()
	{
		return $this->belongsTo('RelacionDocente');

	}

}