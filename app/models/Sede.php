<?php

class Sede extends \Eloquent {

		// Add your validation rules here
	public static $rules = [
		   'nombre' => 'required|unique:sedes,nombre'
	];

	// Don't forget to fill this array
	protected $fillable = ['nombre'];
	protected $table='sedes';
	public $timestamps = false;

}