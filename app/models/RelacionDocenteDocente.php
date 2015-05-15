<?php

class RelacionDocenteDocente extends \Eloquent {
	protected $fillable = ['observacion','sede','numeroHorasAcademicas','numeroHorasAdministrativas','totalHoras','cedulaDocente','idRelacion'];
	protected $table='RelacionDocenteDocentes';
	public $timestamps = false;
}