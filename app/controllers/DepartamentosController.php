<?php

class DepartamentosController extends \BaseController {

	/**
	 * Display a listing of departamentos
	 *
	 * @return Response
	 */
	public function index()
	{
		$departamentos = Departamento::all();


		return View::make('Departamentos.index',['departamentos' => $departamentos, 'cont' => 1]);
	}

	/**
	 * Show the form for creating a new departamento
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Departamentos.create');
	}

	/**
	 * Store a newly created departamento in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$departamento= new Departamento;
		$validator = Validator::make($data = Input::all(), Departamento::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$relacion=Relacion::where('estado', '=', 'Activo')->first();

		if ($relacion) {
			$departamento->nombre=Input::get('nombre');
							if ($departamento->save()) {

										$estadorelacion=['estado' => 2, 'departamento_id' => $departamento->id, 'relacion_id' => $relacion->id ];
										Estadorelacion::create($estadorelacion);
												Session::flash('message', 'Departamento Guardado.');
												Session::flash('class','alert alert-success');
						 						return Redirect::to('departamento');
						 } else {
						 						Session::flash('message', 'Departamento Guardado pero no Agregado en la Relacion. .');
												Session::flash('class','alert alert-error');
						 						return Redirect::to('departamento');		 						
						 }
		} else {
						if (Departamento::create($data)) {
											Session::flash('message', 'Departamento Guardado.');
											Session::flash('class','alert alert-success');
					 						return Redirect::to('departamento');
					 } else {
					 						Session::flash('message', 'Departamento NO Guardado.');
											Session::flash('class','alert alert-error');
					 						return Redirect::to('departamento');		 						
					 }
		}
		

		
	

		
	}

	/**
	 * Display the specified departamento.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$departamento = Departamento::findOrFail($id);

		return View::make('Departamentos.show', compact('departamento'));
	}

	/**
	 * Show the form for editing the specified departamento.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$departamento = Departamento::find($id);

		return View::make('Departamentos.edit', compact('departamento'));
	}

	/**
	 * Update the specified departamento in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$id=Input::get('id');
		$departamento = Departamento::findOrFail($id);

		$data=Input::all();		
		if ($departamento->update($data)) {
								Session::flash('message', 'Departamento Actualizado.');
								Session::flash('class','alert alert-success');
		 						return Redirect::to('departamento');
		} else {
								Session::flash('message', 'Departamento NO Actualizado.');
								Session::flash('class','alert alert-error');
		 						return Redirect::to('departamento');
		}
		

		return Redirect::to('departamento');
	}

	/**
	 * Remove the specified departamento from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Departamento::destroy($id);

		return Redirect::route('departamentos.index');
	}

}
