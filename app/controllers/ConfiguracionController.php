<?php

class ConfiguracionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /configuracion
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('configuracion.configuracion');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /configuracion/create
	 *
	 * @return Response
	 */ 
	public function departamento()
	{
		
		$departamentos=Departamento::all();
		return View::make('configuracion.createdepa',compact('departamentos'))->with('cont',1);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /configuracion
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /configuracion/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /configuracion/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /configuracion/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /configuracion/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}