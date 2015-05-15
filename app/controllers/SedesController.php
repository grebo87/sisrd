<?php

class SedesController extends \BaseController {

	/**
	 * Display a listing of sedes
	 *
	 * @return Response
	 */
	public function index()
	{
		$sedes = Sede::all();

		return View::make('Sedes.index', ['sedes' => $sedes, 'cont' => 1]);
	}

	/**
	 * Show the form for creating a new sede
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Sedes.create');
	}

	/**
	 * Store a newly created sede in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Sede::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		if (Sede::create($data)) {
								Session::flash('message', 'Sede Agregada.');
								Session::flash('class','alert alert-success');
		 						return Redirect::to('sedes');
		} else {
								Session::flash('message', 'Sede NO Agregada');
								Session::flash('class','alert alert-error');
		 						return Redirect::to('sedes');
		}
			
		;

		return Redirect::to('sedes');
	}

	/**
	 * Display the specified sede.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$sede = Sede::findOrFail($id);

		return View::make('sedes.show', compact('sede'));
	}

	/**
	 * Show the form for editing the specified sede.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$sede = Sede::find($id);

		return View::make('Sedes.edit', compact('sede'));
	}

	/**
	 * Update the specified sede in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$id=Input::get('id');
		$sede = Sede::findOrFail($id);

		$data=Input::all();
		if ($sede->update($data)) {
								Session::flash('message', 'Sede Actualizada.');
								Session::flash('class','alert alert-success');
		 						return Redirect::to('sedes');
		} else {
								Session::flash('message', 'Sede Actualizada.');
								Session::flash('class','alert alert-error');
		 						return Redirect::to('sedes');
		}

		
	}

	/**
	 * Remove the specified sede from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Sede::destroy($id);

		return Redirect::route('sedes.index');
	}

}
