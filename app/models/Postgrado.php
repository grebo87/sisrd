<?php
/**
* Clase (Modelo) para Gestionar( Guardar, Busacar, Editar y Eliminar) los Postgrado(s) de un Docente
*
*
*/
class Postgrado extends \Eloquent {
	
	protected $fillable = ['id','postgrado','ceduladocente'];
	protected $table='postgrados';
	public $timestamps = false;



	public function docente()
	{
		return $this->belongsTo('Docente');

	}
}