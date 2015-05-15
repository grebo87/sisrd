<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Usuario extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];
	protected $table='usuario';
	// Don't forget to fill this array
	//protected $fillable = ['username','password','nombre','nivel','estado','apellido','cedula','departamento'];
	public $timestamps = false;

	/**
	 * Funcion para trabajar con los pregrados del Docente .
	 * GET /postgrados
	 *
	 * @return Response
	 */
	public function Administrativo()
	{
		return $this->belongsTo('Administrativo');

	}


	/**
	 * Funcion para trabajar con los pregrados del Docente .
	 * GET /postgrados
	 *
	 * @return Response
	 */
	public function UsuarioDocente()
	{
		return $this->belongsTo('Docenteusuario');

	}
}