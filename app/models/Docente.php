<?php
/**
* Clase (Modelo) para Gestionar( Guardar, Busacar, Editar y Eliminar) los Docente(s)
*
*
*/
class Docente extends \Eloquent {

	protected $fillable = ['primernombre', 'segundonombre', 'primerapellido', 'segundoapellido', 'cedula', 'cargo', 'dedicacion', 'categoria', 'condicion', 'fechaingreso', 'status', 'observacion', 'sede', 'departamento_id',];
	protected $table='docentes';
	public $timestamps = false;
	
	public static $rules=[
							'cedula' => 'unique:docentes,cedula|required|numeric|min:7',
							'primernombre' => 'required|alpha',
							'segundonombre' => 'alpha',
							'primerapellido' => 'required|alpha',
							'segundoapellido' => 'alpha',
						 ];

	/**
	 * Funcion para trabajar con los postgrados del Docente .
	 * GET /postgrados
	 *
	 * @return Response
	 */
	public function postgrados()
	{
		return $this->hasMany('Postgrado');
	}

	/**
	 * Funcion para trabajar con los pregrados del Docente .
	 * GET /postgrados
	 *
	 * @return Response
	 */
	public function pregrados()
	{
		return $this->hasMany('Pregrado');
	}


	/**
	 * Funcion para trabajar con los pregrados del Docente .
	 * GET /postgrados
	 *
	 * @return Response
	 */
	public function relacionDocente()
	{
		return $this->hasMany('RelacionDocente');
	}


	/**
	 * Funcion para trabajar con los pregrados del Docente .
	 * GET /postgrados
	 *
	 * @return Response
	 */
	public function saberDocente()
	{
		return $this->hasMany('SaberDocente');
	}

	/**
	 * Funcion para trabajar con los pregrados del Docente .
	 * GET /postgrados
	 *
	 * @return Response
	 */
	public function departamento()
	{
		return $this->belongsTo('Departamento');

	}


	
	/**
	 * Funcion para trabajar con los pregrados del Docente .
	 * GET /postgrados
	 *
	 * @return Response
	 */
	public function usuario()
	{
		return $this->belongsTo('Docenteusuario');

	}

}