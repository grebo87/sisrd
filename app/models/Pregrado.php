<?php
/**
* Clase (Modelo) para Gestionar( Guardar, Busacar, Editar y Eliminar) los Pregrado(s) de un Docente
*
*
*/
class Pregrado extends \Eloquent {
	
	protected $fillable = ['id','pregrado','ceduladocente'];
	protected $table='pregrados';
	public $timestamps = false;


	public function docente()
	{
		return $this->belongsTo('Docente');

	}

}