<?php

class SaberesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /saberes
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		return View::make('Saberes.index');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /saberes/create
	 *
	 * @return Response
	 */
	public function create()
	{

		$departamentos['']='Selecione';
		foreach (Departamento::orderBy('nombre','ASC')->get() as $value) {
						
						$departamentos[$value->id]=$value->nombre;
					}

		return View::make('Saberes.create',compact('departamentos'));
		
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /saberes
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$data = Input::all();
		unset($data['_token']);
		$messages = array(
    		'codigo.unique' => 'El Código del Saber ya esta Registrado.',
    		'required' => 'El Campo :attribute es requerido.',
    		'numeric' => 'El Campo :attribute debe contener solo Numeros.',
    		);

		$validator = Validator::make($data, Sabere::$rules,$messages);

		if ($validator->fails())
		{
			Session::flash('class','alert alert-error');
			return Redirect::to('saber/create')->withErrors($validator)->withInput();
		}

		if ($saber=Sabere::create($data)) {

			Session::flash('message', 'Datos Guardados');
			Session::flash('class','alert alert-success');
			return Redirect::to('saber/create');
				
		}
		 else
		 {
		 	Session::flash('message', 'Datos No Guardados');
			Session::flash('class','alert alert-error');
		 	return Redirect::to('saber/create');
		}
	}

	/**
	 * Display the specified resource.
	 * GET /saberes/{codigo}
	 *
	 * @param  int  $codigo
	 * @return Response
	 */
	public function show()
	{
		//$data=Sabere::all();
		$departamentos['']='Selecione';
		foreach (Departamento::orderBy('nombre','ASC')->get() as $value) {
						$departamentos[$value->id]=$value->nombre;

					}
				
		return View::make('Saberes.show',compact('departamentos'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /saberes/{codigo}/edit
	 *
	 * @param  int  $codigo
	 * @return Response
	 */
	public function edit($codigo)
	{
		$departamentos['']='Selecione';
		foreach (Departamento::orderBy('nombre','ASC')->get() as $value) {
						$departamentos[$value->id]=$value->nombre;

					}
		return View::make('Saberes/edit',array( 'saber' => Sabere::where( 'codigo', '=' ,$codigo )->first(), 'departamentos' => $departamentos)); 
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /saberes/{codigo}
	 *
	 * @param  int  $codigo
	 * @return Response
	 */
	public function update()
	{
		$data=Input::all();
		$saber=array(
						'unidad'                => $data['unidad'],
						'horassemanales'        => $data['horassemanales'],
						'departamento_id'       => $data['departamento_id'],
						'carrera'               => $data['carrera'],
						'codigo'                => $data['codigo']
					);

		if(Sabere::where('codigo','=',$data['oldcodigo'])->update($saber))
		{
			Session::flash('message', 'Datos Modificados');
			Session::flash('class','alert alert-success');	
			return Redirect::to('saber/edit/'.$data['codigo']);
		}
		else
		{
			Session::flash('message','Datos no Modificados');
			Session::flash('class','alert alert-error');		
			return Redirect::to('saber/edit/'.$data['codigo']);
		}
		
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /saberes/{codigo}
	 *
	 * @param  int  $codigo
	 * @return Response
	 */
	public function destroy($codigo)
	{
		//
	}

	/**
	 * Display the specified resource.
	 * POST /saberes/listsaber
	 * @return Response
	 */
	public function listsaber()
	{

		$departamentoAcademico=$_POST['depa'];		

		$list=Sabere::where('departamento_id',"=",$departamentoAcademico)->get();
		$departamento=Departamento::find($departamentoAcademico);
			
		$html='<h3>Listado de Saberes del Departamento de '.$departamento->nombre.'</h3><table cellpadding="0" cellspacing="0" border="1" class="display" id="data">
		<thead>
		<tr>
			<th width="20%">Unidad Curricular</th>
			<th width="25%">Horas Semanales</th>
			<th width="25%">Departamento Académico</th>
			<th width="15%">Carrera</th>
			<th width="15%">Código</th>
			<th width="15%">Editar</th>
		</tr>
		</thead>
		<tbody>';
		
		
		foreach ($list as $value) {
										$html.='<tr><td>'.$value->unidad.'</td><td>'.$value->horassemanales.'</td><td>'.$departamento->nombre.'</td><td>'.$value->carrera.'</td><td>'.$value->codigo.'</td><td><a id="editar" href="'.url("saber/edit")."/".$value->codigo.'">Editar</a> </td></tr>	';
									}

		
		$html.="</tbody></table><script type='text/javascript'>
			$(document).ready(function(){
				$('#data').dataTable();
			});	</script>";

		return $html;
	}

}
