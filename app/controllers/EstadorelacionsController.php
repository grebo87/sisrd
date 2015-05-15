<?php

class EstadorelacionsController extends \BaseController {

	/**
	 * Display a listing of estadorelacions
	 *
	 * @return Response
	 */
	public function index()
	{
		$estadorelacions = Estadorelacion::all();

		return View::make('estadorelacions.index', compact('estadorelacions'));
	}

	/**
	 * Show the form for creating a new estadorelacion
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('estadorelacions.create');
	}

	/**
	 * Store a newly created estadorelacion in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Estadorelacion::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Estadorelacion::create($data);

		return Redirect::route('estadorelacions.index');
	}

	/**
	 * Display the specified estadorelacion.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$estadorelacion = Estadorelacion::findOrFail($id);

		return View::make('estadorelacions.show', compact('estadorelacion'));
	}

	/**
	 * Show the form for editing the specified estadorelacion.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$estadorelacion = Estadorelacion::find($id);

		return View::make('estadorelacions.edit', compact('estadorelacion'));
	}

	/**
	 * Update the specified estadorelacion in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$estadorelacion = Estadorelacion::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Estadorelacion::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$estadorelacion->update($data);

		return Redirect::route('estadorelacions.index');
	}

	/**
	 * Remove the specified estadorelacion from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Estadorelacion::destroy($id);

		return Redirect::route('estadorelacions.index');
	}

}
