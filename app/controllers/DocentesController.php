<?php

class DocentesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /docentes
	 *
	 * @return Response
	 */
	public function getIndex()
	{

		return View::make('docentes.index');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /docentes/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$sedes['']='Selecione';
		$departamentos['']='Selecione';
		foreach (Sede::orderBy('nombre','ASC')->get() as $value) {
						$sedes[$value->nombre]=$value->nombre;

					}

		foreach (Departamento::orderBy('nombre','ASC')->get() as $key) {
						$departamentos[$key->id]=$key->nombre;
				}

		$data=['sedes' => $sedes, 'departamentos' => $departamentos];

		return View::make('docentes.create',compact('data'));
		
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /docentes
	 *
	 * @return Response
	 */
	public function store()
	{
		$messages = array(
    						'cedula.unique' => 'La cedula ya esta Registrado.',
    						'required'      => 'El Campo :attribute ¡es requerido.',
    						'numeric'       => 'El Campo :attribute debe contener solo Numeros.',
    						'alpha'         => 'El Campo :attribute debe contener solo letras.',
    						'min'           => 'El Campo :attribute debe ser mayor de :min.',
    						'max'           => 'El Campo :attribute debe ser menor de :max.',
			);

		
		$validator = Validator::make($data = Input::all(), Docente::$rules,$messages);

		if ($validator->fails())
		{

			Session::flash('class','alert alert-error');
			return Redirect::to('docente/create')->withErrors($validator)->withInput();
		}
		$departamento=Departamento::find(Input::get('departamentoicademico'));
		$docente= new Docente;
		$docente->primernombre=Input::get('primernombre');
		$docente->segundonombre=Input::get('segundonombre');
		$docente->primerapellido=Input::get('primerapellido');
		$docente->segundoapellido=Input::get('segundoapellido');
		$docente->cedula=Input::get('cedula');
		$docente->cargo=Input::get('cargo');
		$docente->dedicacion=Input::get('dedicacion');
		$docente->categoria=Input::get('categoria');
		$docente->condicion=Input::get('condicion');
		$docente->fechaingreso=Input::get('fechaingreso');
		$docente->status=Input::get('status');
		$docente->observacion=Input::get('observacion');
		$docente->sede=Input::get('sede');
		$docente->departamento_id=$departamento->id;
		$docente->departamento()->associate($departamento);
		$guardar_docente= $docente->save();

		$preg=Input::get('pregrado');

		foreach ($preg as  $value) {
			$pregrados[]=array('pregrado' => $value,'docente_id' => $docente->id);
		}
		$postg=Input::get('postgrado');
		

		
		foreach ($postg as  $value) {
						
						if($value != ''){
								$postgrados[]=array('postgrado' => $value,'docente_id' => $docente->id);
						}
		}
		
			
		
		$pregrado= new Pregrado;
		$pregrado->docente()->associate($docente);
		$guardar_pregrado= $pregrado->insert($pregrados);
	
		if(isset($postgrados))
		{
			$postgrado= new Postgrado;
			$postgrado->docente()->associate($docente);
			$guardar_postgrado= $postgrado->insert($postgrados);	
		}	
		
		if ($guardar_docente == 1 && $guardar_pregrado == 1) {
						
		
			Session::flash('message', 'Datos Guardados');
			Session::flash('class','alert alert-success');
			return Redirect::to('docente/create');
		}
		else
		{
			Session::flash('message', 'Datos no Guardados');
			Session::flash('class','alert alert-error');
			return Redirect::to('docente/create');
		}
		
	}

	/**
	 * Display the specified resource.
	 * GET /docentes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{

		$departamentos['']='Selecione';
		foreach (Departamento::orderBy('nombre','ASC')->get() as $key) {
						$departamentos[$key->id]=$key->nombre;
				}
		
		return View::make('docentes.show',compact('departamentos'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /docentes/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Docente=Docente::find($id);
		$departamento=Departamento::orderBy('nombre','ASC')->get();
		$sede=Sede::orderBy('nombre','ASC')->get();
		foreach ($departamento as $value) {
			$departamentos[$value->id]=$value->nombre;
		}

		foreach ($sede as $key ) {
			$sedes[$key->nombre]=$key->nombre;
		}
		$pregrados=$Docente->pregrados()->get();
	  	$postgrados=$Docente->postgrados()->get();
		return View::make('docentes.edit',array('docente' => $Docente, 'departamentos' => $departamentos, 'sedes' => $sedes, 'pregrados' => $pregrados, 'postgrados' => $postgrados, 'i' => 1, 'j' => 1));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /docentes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$data=Input::all();
		$id=Input::get('id');
		
		if(Docente::where('id','=',$id)->update($data))
		{	
			Session::flash('message', 'Datos Personales Modificados');
			Session::flash('class','alert alert-success');
			return Redirect::to('docente/edit/'.$id);
		}

		else
		{
			Session::flash('message', 'Datos Personales No  Modificados');
			Session::flash('class','alert alert-error');
			return Redirect::to('docente/edit/'.$id);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /docentes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * Display a listing of the resource.
	 * POST /docentes/getListas
	 *
	 * @return Response
	 */

	public function getListas()
	{
		$departamentoAcademico=$_POST['depa'];
		$departamento=Departamento::find($departamentoAcademico);

		$list=Docente::where('departamento_id',"=",$departamentoAcademico)->orderBy('primerapellido','asc')->get();
		$html='<h3>Listado de Docentes del Departamento de '.$departamento->nombre.'</h3><table cellpadding="0" cellspacing="0" width="220%" border="1" class="display" id="data">
		<thead>
		<tr>
			<th>Apellidos</th>
			<th>Nombres</th>
			<th>Cedula</th>
			<th>Cargo</th>
			<th>Dedicación</th>
			<th>Categoria</th>
			<th>Condición</th>
			<th>Fecha Ingreso</th>
			<th>Estado</th>
			<th width="200px">Titúlo(s) Pregrado</th>
			<th>Observación</th>
			<th>Sede</th>
			<th>Titúlo(s) de Postgrado</th>						
			<th>Opcion</th>
		</tr>
		</thead>
		<tbody>';
		
															
		foreach ($list as $value) {
										$pregrados=$value->pregrados()->get();
										
										$postgrados=$value->postgrados()->get();
										
										//var_dump($pre);
										$html.='<tr>
										
										<td>'.$value->primerapellido.' '.$value->segundoapellido.'</td>
										<td>'.$value->primernombre.' '.$value->segundonombre.'</td>
										<td>'.$value->cedula.'</td>
										<td>'.$value->cargo.'</td>
										<td>'.$value->dedicacion.'</td>
										<td>'.$value->categoria.'</td>
										<td>'.$value->condicion.'</td>
										<td>'.$value->fechaingreso.'</td>
										<td>'.$value->status.'</td><td>';
													foreach ($pregrados as $key1 ) {$html.= $key1->pregrado."<br/> ";}
										$html.='</td><td>'.$value->observacion.'</td>
										<td>'.$value->sede.'</td><td>';
													foreach ($postgrados as $key ){$html.= $pre= $key->postgrado."<br/> ";}
										$html.='</td><td><a id="editar" href="'.url("docente/edit").'/'.$value->id.'">Editar</a> </td>
										 </tr>';
									}

		$html.="</tbody></table><script type='text/javascript'>
						$(document).ready(function(){
								$('#data').dataTable();
						});</script>";
		return $html;
	}

     /**
	 * Update the specified resource in storage.
	 * PUT /docentes/actualizarpregrado
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function actualizarpregrado()
	{
		$docente_id=Input::get('docente_id');
		$pregrado_id=Input::get('pregrado_id');
		$pregrado=Input::get('pregrado');
		if (Pregrado::where('id','=',$pregrado_id)->update(array('pregrado' => $pregrado))) {
						Session::flash('message', 'Pregrado Actualizado!');
						Session::flash('class','alert alert-success');
						return Redirect::to('docente/edit/'.$docente_id);
		} else {
						Session::flash('message', 'Pregrado NO Actualizado!');
						Session::flash('class','alert alert-success');
						return Redirect::to('docente/edit/'.$docente_id);
		}		
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /docentes/actualizarpostgrado
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function actualizarpostgrado()
	{
		$docente_id=Input::get('docente_id');
		$postgrado_id=Input::get('postgrado_id');
		$postgrado=Input::get('postgrado');
		
		
		if (Postgrado::where('id','=',$postgrado_id)->update([ 'postgrado' => $postgrado ] )) {
								Session::flash('message', 'Postgrado Actualizado!');
								Session::flash('class','alert alert-success');
								return Redirect::to('docente/edit/'.$docente_id);
					} else {
								Session::flash('message', 'Postgrado NO Actualizado!');
								Session::flash('class','alert alert-success');
								return Redirect::to('docente/edit/'.$docente_id);
					}								
	}


	/**
	 * Store a newly created resource in storage.
	 * POST /docentes/agregarpregrado
	 *
	 * @return Response
	 */

	public function agregarpregrado()
	{
		$pre=Input::get('pregrado');
		$cedula=Input::get('id_docente1');
		foreach ($pre as  $value) {
			if($value != ''){
								$pregrados[]=array('pregrado' => $value,'docente_id' => $cedula);
					}
		}
		
		if (Pregrado::insert($pregrados))
		{
			Session::flash('message', 'Pregrado Agregado');
			Session::flash('class','alert alert-success');
			return Redirect::to('docente/edit/'.$cedula);
		}
		else
		{
			Session::flash('message', 'Pregrado No Agregado');
			Session::flash('class','alert alert-error');
			return Redirect::to('docente/edit/'.$cedula);
		}
		
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /docentes/agragarpostgrado
	 *
	 * @return Response
	 */
	
	public function agragarpostgrado()
	{
		$post=Input::get('postgrado');
		$cedula=Input::get('id_docente3');

		foreach ($post as  $value) {
			if($value != ''){
			$postgrados[]=array('postgrado' => $value,'docente_id' => $cedula);
					}
		}		
		
		if (Postgrado::insert($postgrados))
		{
			Session::flash('message', 'Postgrado Agregado');
			Session::flash('class','alert alert-success');
			return Redirect::to('docente/edit/'.$cedula);
		}
		else
		{
			Session::flash('message', 'Postgrado No Agregado');
			Session::flash('class','alert alert-error');
			return Redirect::to('docente/edit/'.$cedula);
		}
	}

	public function form_editar_postgrado()
	{
		$id=Input::get('id');
		$postgrado=Postgrado::find($id);
		echo '<script type="text/javascript">
						$(document).ready(function(){
									$("#close_form_editar_postgrado").click(function(){
										$("#popup12").fadeOut(10);
									});
						});</script>';
		echo '<h2>Editar Postgrado</h2><div class="popup_content" ><form action="'.url('docente/updatepostgrado').'"  class="pure-form pure-form-aligned" method="POST" accept-charset="utf-8" id="pos">
					   <label>Titúlo de Postgrado <input type="text" id="postgrado" value="'.$postgrado->postgrado.'" name="postgrado" required/></label>
				       <input type="hidden" name="docente_id" id="docente_id" value="'.$postgrado->docente_id.'">
				       <input type="hidden" name="postgrado_id" id="postgrado_id" value="'.$postgrado->id.'">
				       <input type="submit" value="Editar" class="pure-button pure-button-primary">	
				       <input type="button" name="close_form_editar_postgrado" id="close_form_editar_postgrado" value="Cerrar" class="pure-button "> 
		</form></div>';


	}

	public function form_editar_pregrado()
	{
		$id=Input::get('id');
		$pregrado=Pregrado::find($id);
		echo '<script type="text/javascript">
						$(document).ready(function(){
									$("#close_form_editar_pregrado").click(function(){
										$("#popup13").fadeOut(10);
									});
						});</script>';
		echo '<h2>Editar Pregrado</h2><div class="popup_content" ><form action="'.url('docente/updatepregrado').'"  class="pure-form pure-form-aligned" method="POST" accept-charset="utf-8" id="pos">
					   <label>Titúlo de Pregrado <input type="text" id="pregrado" value="'.$pregrado->pregrado.'" name="pregrado" required/></label>
				       <input type="hidden" name="docente_id" id="docente_id" value="'.$pregrado->docente_id.'">
				       <input type="hidden" name="pregrado_id" id="pregrado_id" value="'.$pregrado->id.'">
				       <input type="submit" value="Editar" class="pure-button pure-button-primary">	
				       <input type="button" name="close_form_editar_pregrado" id="close_form_editar_pregrado" value="Cerrar" class="pure-button "> 
		</form></div>';
	}

}
