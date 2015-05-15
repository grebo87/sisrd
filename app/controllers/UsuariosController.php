<?php

class UsuariosController extends \BaseController {

	/**
	 * Display a listing of usuarios
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$usuarios = Usuario::all();

		return View::make('Usuarios.index', compact('usuarios'));
	}

	/**
	 * Show the form for creating a new usuario
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Usuarios.create');
	}

	/**
	 * Show the form for creating a new usuario
	 *
	 * @return Response
	 */
	public function createAministrativo()
	{
		return View::make('Usuarios.administrativo');
	}

	/**
	 * Show the form for creating a new usuario
	 *
	 * @return Response
	 */
	public function createDocente()
	{
		return View::make('Usuarios.docente');
	}


	/**
	 * Store a newly created usuario in storage.
	 *
	 * @return Response
	 */
	public function storeAdministrativo()
	{
		
		
		$dataAdministrativo=Input::except('username','password','email','level','active','password_confirmation');
			
		$rules=[
				'primernombre'    => 'required|alpha',
				'segundonombre'   => 'alpha',
				'primerapellido'  => 'required|alpha',
				'segundoapellido' => 'alpha',
				'cedula'          => 'unique:administrativo,cedula|required|numeric',
				'cargo'           => 'required|alpha',
				'username'        => 'unique:usuario,username|required|alpha_num',
				'password'        => 'required|alpha_num|min:8|confirmed',
				'email'           => 'required|email|unique:usuario,email'
				];

		$messages = array(
    						'cedula.unique' => 'La cedula ya esta Registrado.',
    						'required'      => 'El Campo :attribute ¡es requerido.',
    						'numeric'       => 'El Campo :attribute debe contener solo Numeros.',
    						'alpha'         => 'El Campo :attribute debe contener solo letras.',
    						'min'           => 'El Campo Clave debe ser mayor de :min.',
    						'max'           => 'El Campo :attribute debe ser menor de :max.',
    						'email.unique' => 'El Correo ya esta Registrado.',
    						'username.unique' => 'El Nombre de _Usuario No Esta Disponible!.',
    						'confirmed'       => 'Las Claves no son Iguales!.'

			);

		$validator = Validator::make($data = Input::all(), $rules,$messages );

		if ($validator->fails())
		{
			Session::flash('class','alert alert-error');
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$usuario = new Usuario;
		$usuario->username=Input::get('username');
		$usuario->password=Hash::make(Input::get('password'));
		$usuario->email=Input::get('email');
		$usuario->level='Interno';
		$usuario->active='Activo';

		if ($usuario->save()) {

		  						$administrativo = new Administrativo;
		  						$dataAdministrativo['usuario_id']=$usuario->id;
								$administrativo->usuario()->associate($usuario);

								if ($administrativo->insert($dataAdministrativo)) {
								 			Session::flash('message', 'Datos Guardados');
											Session::flash('class','alert alert-success');
											return Redirect::to('user/create');
								 } else {
								 			Session::flash('message', 'Datos no Guardados');
											Session::flash('class','alert alert-error');
											return Redirect::to('user/creat');
								 }
								  

		  } else {
		  				Session::flash('message', 'Datos no Guardados');
						Session::flash('class','alert alert-error');
						return Redirect::to('user/creat');
		  }
		    

		// return Redirect::route('usuarios.index');
	}





	/**
	 * Store a newly created usuario in storage.
	 *
	 * @return Response
	 */
	public function storeDocente()
	{
		
		
		$cedula_docente=Input::get('cedula');
		$docente=Docente::where('cedula','=',$cedula_docente)->first();
			
		$rules=[
				'username'        => 'unique:usuario,username|required|alpha_num',
				'password'        => 'required|alpha_num|min:8|confirmed',
				'email'           => 'required|email|unique:usuario,email'
				];

		$messages = array(
    						
    						'required'        => 'El Campo :attribute ¡es requerido.',
    						'numeric'         => 'El Campo :attribute debe contener solo Numeros.',
    						'alpha'           => 'El Campo :attribute debe contener solo letras.',
    						'min'             => 'El Campo Clave debe ser mayor de :min.',
    						'max'             => 'El Campo :attribute debe ser menor de :max.',
    						'email.unique'    => 'El Correo ya esta Registrado.',
    						'username.unique' => 'El Nombre de Usuario No Esta Disponible!.',
    						'confirmed'       => 'Las Claves no son Iguales!.'

			);

		$validator = Validator::make($data = Input::all(), $rules,$messages );

		if ($validator->fails())
		{
			Session::flash('class','alert alert-error');
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$usuario = new Usuario;
		$usuario->username=Input::get('username');
		$usuario->password=Hash::make(Input::get('password'));
		$usuario->email=Input::get('email');
		$usuario->level='Interno';
		$usuario->active='Activo';

		if ($usuario->save()) {

		  						$docenteusuario = new Docenteusuario;
		  						$docenteusuario->usuario_id=$usuario->id;
		  						$docenteusuario->docente_id=$docente->id;
								$docenteusuario->usuario()->associate($usuario);
								$docenteusuario->docente()->associate($docente);

								if ($docenteusuario->save()) {
								 			Session::flash('message', 'Datos Guardados');
											Session::flash('class','alert alert-success');
											return Redirect::to('user/create');
								 } else {
								 			Session::flash('message', 'Datos no Guardados');
											Session::flash('class','alert alert-error');
											return Redirect::to('user/creat');
								 }
								  

		  } else {
		  				Session::flash('message', 'Datos no Guardados');
						Session::flash('class','alert alert-error');
						return Redirect::to('user/creat');
		  }
		    

	}


	/**
	 * Display the specified usuario.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		

		return View::make('Usuarios.show');
	}

	/**
	 * Show the form for editing the specified usuario.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$usuario = Usuario::find($id);

		return View::make('usuarios.edit', compact('usuario'));
	}

	/**
	 * Update the specified usuario in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$usuario = Usuario::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Usuario::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$usuario->update($data);

		return Redirect::route('usuarios.index');
	}

	/**
	 * Remove the specified usuario from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function datosdocente()
	{
		$cedula= Input::get('cedula');
		$docente=Docente::where('cedula', '=' , $cedula)->where('status','=', 'Activo')->first();
		if ($docente != null) {
			$departamento=Departamento::find($docente->departamento_id);
			$docente->depart=$departamento->nombre;
			return $docente;
		} else {
			return "null";
		}
		
		
	}

	

}
