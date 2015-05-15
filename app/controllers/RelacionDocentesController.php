<?php

class RelacionDocentesController extends \BaseController {

	public $campos = 0;

	/**
	 * Display a listing of relaciondocentes
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$relaciondocentes = Relacion::all();

		return View::make('RelacionDocentes.index', compact('relaciondocentes'));
	}

	/**
	 * Show the form for creating a new relaciondocente
	 *
	 * @return Response
	 */
	public function create()
	{
		$relaciondocentes = DB::table('relacion')->where('estado','Activo')->first();
		return View::make('RelacionDocentes.create',compact('relaciondocentes'));
	}

	/**
	 * Store a newly created relaciondocente in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$messages = array(
    		'required' => 'El Campo :attribute ¡es requerido.',
    		'numeric'  => 'El Campo :attribute debe contener solo Numeros.',
    	);

		$validator = Validator::make($data = Input::all(), Relacion::$rules,$messages);
			
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$relacion= new Relacion;
		$relacion->lapso =Input::get('lapso');
		$relacion->fechalapso =Input::get('fechalapso');
		$relacion->trimestre =Input::get('trimestre');
		$relacion->fechatrimestre =Input::get('fechatrimestre');
		$relacion->estado = 'Activo';
		$relacion->fechainicio =Input::get('fechainicio');
		$relacion->fechafinal =Input::get('fechafinal');
		
		if($relacion->save())
		{
			$departamentos=Departamento::all();
			foreach ($departamentos as $value) {
				$estadoreracion[]=[
									'estado' => 2,
									'departamento_id' => $value->id,
									'relacion_id' => $relacion->id
									];
			}
			
			$relacionestado= new Estadorelacion;
			$relacionestado->relacion()->associate($relacion);

				if ($relacionestado->insert($estadoreracion)) {
						Session::flash('message', 'Datos Guardados');
						Session::flash('class','alert alert-success');
						return Redirect::to('relacion/create');
				} else {
						Session::flash('message', 'Datos no Guardados');
						Session::flash('class','alert alert-error');
						return Redirect::to('relacion/create');
				}
		}

		else
		{
			Session::flash('message', 'Datos no Guardados');
			Session::flash('class','alert alert-error');
			return Redirect::to('relacion/create');
		}
		
	}

	/**
	 * Display the specified relaciondocente.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$relaciondocente = RelacionDocente::findOrFail($id);

		return View::make('RelacionDocentes.show', compact('relaciondocente'));
	}

	/**
	 * Show the form for editing the specified relaciondocente.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$relaciondocente = RelacionDocente::find($id);
	


		return View::make('RelacionDocentes.edit', compact('relaciondocente'));
	}

	/**
	 * Update the specified relaciondocente in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$messages = array(
    		'required' => 'El Campo :attribute es requerido.',
    		'numeric'  => 'El Campo :attribute debe contener solo Numeros.',
    	);
		$data = Input::all();
		$validator = Validator::make($data, Relacion::$rules,$messages);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		unset($data['_token']);
		if(Relacion::where('id','=',$data['id'])->update($data))
		{
			Session::flash('message', 'Datos Modificados');
			Session::flash('class','alert alert-success');
			return Redirect::to('relacion/create');
		}
		else
		{
			Session::flash('message', 'Datos No Modificados');
			Session::flash('class','alert alert-error');
			return Redirect::to('relacion/create');
		}
		
	}

	/**
	 * Remove the specified relaciondocente from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		RelacionDocente::destroy($id);

		return Redirect::route('RelacionDocentes.index');
	}


	/**
	 * Display the specified relaciondocente.
	 */
	public function registrarrelacionshow()
	{
		 
		
		return View::make('RelacionDocentes.registrar');
	}

	/**
	 * function registro_relacion
	 *
	 * 
	 * @return Response
	 */

	public function registro_relacion()
	{
		$cedula=Input::get('cedula');
		$relacion=Relacion::where('estado','=','Activo')->first();
		$docente=Docente::where('cedula', '=' ,$cedula)->first();
		$departamento=Departamento::find($docente->departamento_id);
		$sedes=Sede::orderBy('nombre','ASC')->get(['nombre']);
			$sede['']="Seleccione";
			foreach ($sedes as $value) {
				$sede[$value->nombre]=$value->nombre;

			}

		if ($docente) {
					
					if (RelacionDocente::where('docente_id','=',$docente->id)->where('relacion_id','=',$relacion->id)->first()) {
								Session::flash('message', 'El Docente tiene una Relación Previa!.');
								Session::flash('class', 'alert alert-error');
								return Redirect::back();
					} else {

								if ($docente->dedicacion === 'Dedicacion Exclusiva') $docente->tiempo = 36;
								if ($docente->dedicacion === 'Tiempo Completo') $docente->tiempo = 30;
								if ($docente->dedicacion === 'Medio Tiempo') $docente->tiempo = 18;
								if ($docente->dedicacion === 'Tiempo Convencional') $docente->tiempo = 8;
								
								$data=[
										'relacion'   => $relacion,
										'docente'    => $docente,
										'sedes'      => $sede,
										'pregrados'  => $docente->pregrados()->get(),
										'postgrados' => $docente->postgrados()->get(),
										'i'          => 1,
										'j'          => 1,
										'departamento' => $departamento
			  					]; 


								return View::make('RelacionDocentes.registro',$data);

							}
					

		} else {
			Session::flash('message', 'No hay Registro con esa Cedula!.');
			Session::flash('class', 'alert alert-error');
			return Redirect::back();
		}		
	}

	/**
	 * function listas
	 *
	 * 
	 * @return Response
	 */

	public function listas()
	{
		$departamento=Input::get('departamento');
		
		$resultado=Sabere::where( 'departamento_id', "=" , $departamento )->get();
		if (!$resultado) {
			$saberes="vacio";
		}
		else{
			$this->campos = $this->campos + 1;
			$html='<div id ="listasaber"><label><strong>Unida Curricular:</strong><select name="nombre[]" id="nombre[]" class="nombre" required autofocus  onclick="hora();"  ><option value="" selected="selected" >Seleccione</option>';
				foreach ($resultado as $value) {
				$html.='<option value="'.$value->codigo.'">'.$value->unidad.'</option>';
				}
			$html.='</select></label>';	
			$html.='&nbsp;&nbsp;&nbsp;&nbsp;<label><strong>Horas Semanales: <span id="hora"></span></strong></label></div>';
		}

		return $html;
			
	}


	/**
	 * function guardarrelacion
	 *
	 * 
	 * @return Response
	 */

	public function guardarrelacion()
	{
		
		$secciones=Input::get('secciones');
		$i=0;
		$docente=Docente::find(Input::get('docente_id'));
		$relacion=Relacion::find(Input::get('relacion_id'));

		
		$relaciondocente= new RelacionDocente;

		$relaciondocente->horasacademicas=Input::get('horasAcademicas');
		$relaciondocente->horasadministrativas=Input::get('horasAdministrativas');
		$relaciondocente->totalhoras=Input::get('totaHoras');
		$relaciondocente->observacion=Input::get('observacion');
		$relaciondocente->sede=Input::get('sede');
		$relaciondocente->docente()->associate($docente);
		$relaciondocente->relacion()->associate($relacion);

		
		if ( $relaciondocente->save() ) {
			

				foreach (Input::get('codigo') as $key) {

					$id_saber=Sabere::where('codigo','=',$key)->first();
					$data[]=[ 
							'numerosecciones'    => $secciones[$i],
							'sabere_id'          => $id_saber->id,
							'docente_id'         => $docente->id,
							'relaciondocente_id' => $relaciondocente->id
						  ];
					$i++;
				}

				$saberdocente = new SaberDocente;
				$saberdocente->docente()->associate($docente);
				$saberdocente->relacionDocente()->associate($relaciondocente);
				
					if ($saberdocente->insert($data)) {
								Session::flash('message', 'Relación Guardada.');
								Session::flash('class','alert alert-success');
								return Redirect::to('relacion/registrar');
					} else {
								Session::flash('message', 'Relación Guardada Incompleta.');
								Session::flash('class','alert alert-error');
								return Redirect::to('relacion/registrar');
					}	

				
		} else {
					Session::flash('message', 'Relación No Guardada.');
					Session::flash('class','alert alert-error');
					return Redirect::to('relacion/registrar');
		}	
			
		
	}

	/**
	 * function listarelacionshow
	 *
	 * 
	 * @return Response
	 */


	public function listarelacionshow()
	{
		$departamentos['']='Selecione';
		foreach (Departamento::orderBy('nombre','ASC')->get() as $value) {
						$departamentos[$value->id]=$value->nombre;

					}
		return View::make('RelacionDocentes.relaciondocente',compact('departamentos'));
	}

	/**
	 * function listarelacionget
	 *
	 * 
	 * @return Response
	 */
	public function listarelacionget()
	{
		$i=0;
		$departamento=Input::get('depa');
		$RelacionDocentes=Relacion::where('estado', '=' , 'Activo' )->first();
		$docente=Docente::where('departamento_id', '=' , $departamento)->get();
		$departamento_id=Departamento::find($departamento);
		$estado=$RelacionDocentes->estado()->where('departamento_id','=',$departamento_id->id)->first();
		$html='';

		if ($estado->estado === 0) {
					$html.= '
					<h3>La Relación esta Actualmente en Corrección.</h3><br>
					<a href="'.url('relacion/aprobar', $estado->id).'" class="pure-button"  title="">Aprobar</a>  <a href="'.url('relacion/mensaje',$estado->id).'" class="pure-button title="">Corrección</a><br><br>
					';
			
		} 
		if ($estado->estado === 1) {
					$html.= <<<EOD
					<h3>La Relación Esta Aprobada.</h3><br><br>
EOD;
			
		}
		if ($estado->estado === 2) {
					$html.='
					<a class="pure-button" href="'.url('relacion/aprobar',$estado->id).'" title="">Aprobar</a>  <a class="pure-button" href="'.url('relacion/mensaje', $estado->id).'" title="">Corrección</a><br><br>
							';
			
		}
		

		$html.= <<<EOD
						<h1>RELACION DEL PERSONAL DOCENTE</h1>
						<h1>DEL DEPATAMENTO $departamento_id->nombre </h1>
						<h1>TSU LAPSO $RelacionDocentes->lapso - $RelacionDocentes->fechalapso -  PNF TRIMESTRE $RelacionDocentes->trimestre - $RelacionDocentes->fechatrimestre </h1>
						<br />
						<table id="data" width="250%" >
						<thead>
  								 <tr>
   										<th> N<sup>o</sup> </th>
   										<th >Apellidos y Nombres</th>
  										<th>Cedula</th>
   										<th>Materia/Saber</th>
   										<th>N<sup>o</sup>  de <br /> Horas Academicas</th>
   										<th>N<sup>o</sup>  de <br />Horas Administrativas</th>
   										<th>Total Horas</th>
   										<th>N<sup>o</sup>  de<br /> Seccion(es)</th>
   										<th>Dedicacion</th>
   										<th>Categoria</th>
   										<th>Titulo</th>
   										<th>Titulo de Postgrado</th>
   										<th>Observacion</th>
   										<th>Editar</th>
   								</tr>
   						</thead>
						<tbody>
EOD;


foreach ($docente as $value) {

	if ( $relacion=RelacionDocente::where('relacion_id','=' ,$RelacionDocentes->id)->where('docente_id','=' ,$value->id)->first() )
	{


						$i++;
						$html.=<<<EOD
						 <tr>
   										<td> $i </td>
   										<td >$value->primerapellido $value->segundoapellido <br/>$value->primernombre $value->segundonombre</td>
  										<td>$value->cedula</td>
  										<td>
EOD;

						$resultado=$value->saberDocente()->where('relaciondocente_id','=' ,$relacion->id)->get();

							foreach ($resultado as $key) {
									$saber=Sabere::find($key->sabere_id);
									$html.=$saber->unidad.' <br/><br/>';


												}
						$html.='</td>';
   						$html.='<td>'.$relacion->horasacademicas.'</td>';
   						$html.='<td>'.$relacion->horasadministrativas.'</td>';
   						$html.='<td>'.$relacion->totalhoras.'</td>';
   						$html.='<td>';
						$resul=$value->saberDocente()->where('relaciondocente_id','=' ,$relacion->id)->get();

											foreach ($resul as $key) {
								
																		$html.=$key->numerosecciones.'<br/><br/>';

																		}

						$html.='</td>';
						$html.='<td>'.$value->dedicacion.'</td>';
   						$html.='<td>'.$value->categoria.'</td><td>';

   							$pregrados=$value->pregrados()->get();

											foreach ($pregrados as $key) {
								
																		$html.=$key->pregrado.'<br/>';

																		}


   						$html.='</td><td>';

   						$postgrados=$value->postgrados()->get();

											foreach ($postgrados as $key) {
								
																		$html.=$key->postgrado.'<br/>';

																		}

   						$html.='</td>';
   						$html.='<td>'.$relacion->observacion.'</td>';
   						$data=array(
   							'cedula'=>$value->cedula,
   							'id' => $relacion->relacion_id );
   						$html.='<td>';
   						if ($estado->estado !== 1)
   						{
   							$html.='<a href="edit'.$value->id.'">Editar</a></td></tr>';
   						}

							}
						}
		$html.="</tbody></table>

		<script type='text/javascript'>


		$(document).ready(function(){


		$('#data').dataTable();
		});



		</script>";

 				return $html;
	}

	/**
	 * function editarrelacion
	 *
	 * 
	 * @return Response
	 */
	public function editarrelacion($id)
	{	
		 $docente=Docente::find($id);
		 $relacion=Relacion::where( 'estado' , '=' , 'Activo')->first();
		 $relacionDocente=$docente->relacionDocente()->where( 'relacion_id', '=' ,$relacion->id )->first();
		 $saberes=$docente->saberDocente()->where('relaciondocente_id','=' ,$relacionDocente->id )->get();
		 $pregrados=$docente->pregrados()->get();
		 $postgrados=$docente->postgrados()->get();
		 $departamento=Departamento::find($docente->departamento_id);
		 $sedes=Sede::orderBy('nombre','ASC')->get(['nombre']);
		 $sede['']="Seleccione";

			foreach ($sedes as $value) {
						$sede[$value->nombre]=$value->nombre;

						}	 
		 $data=array(
		 			 'relacion'        => $relacion,
		 			 'relacionDocente' => $relacionDocente,
		 			 'docente'         => $docente,
		 			 'saberdocente'    => $saberes,
		 			 'pregrados'       => $pregrados,
		 			 'postgrados'      => $postgrados,
		 			 'sedes'           => $sede,
		 			 'departamento' => $departamento
		 			 );

		 return View::make('RelacionDocentes.edit',$data);
	}

	/**
	 * function actualizarrelacion
	 *
	 * 
	 * @return Response
	 */
	public function actualizarrelacion()
	{
		$data=[
				'horasacademicas'      => Input::get('horasAcademicas'),
				'horasadministrativas' => Input::get('horasAdministrativas'),
				'observacion'          => Input::get('observacion'),
				'sede'                 => Input::get('sede'),
				];

		$cedula=Input::get('docente_id');
		$id=Input::get('relaciondocente_id');
		var_dump(Input::all());

		if (RelacionDocente::where('id','=',$id)->update($data))
		 {
		 	Session::flash('message', 'Datos Editados' );
		 	Session::flash('class','alert alert-success');
			return Redirect::to('relacion/edit'.$cedula);
		} 
		else
		 {
		 	Session::flash('message', 'Datos no Editados' );
		 	Session::flash('class','alert alert-error');
			return Redirect::to('relacion/edit'.$cedula);
		}
		
		
	}

	/**
	 * function eliminarsaberdocente
	 *
	 * 
	 * @return Response
	 */

	public function eliminarsaberdocente($saber_id,$relaciondocente_id)
	{
		
		$saberdocente = SaberDocente::find($saber_id);
		
		$saber = Sabere::find($saberdocente->sabere_id);
		
		$relaciondocente = RelacionDocente::find($relaciondocente_id);
		
		$menos = $saberdocente->numerosecciones * $saber->horassemanales;
		
		$resta = $relaciondocente->horasacademicas - $menos;
	
		$horasAdministrativas = $relaciondocente->totalhoras - $resta;
		
		//var_dump($saberdocente->idrelaciondocentedocente);

		 if (SaberDocente::destroy($saberdocente->id)) {
					
		 			$relaciondocente->horasacademicas = $resta;
		 			$relaciondocente->horasadministrativas = $horasAdministrativas;
		 			$relaciondocente->save();
		  			Session::flash('message', 'Datos Eliminados');
		  			Session::flash('class','alert alert-success');
					return Redirect::to('relacion/edit'.$relaciondocente->docente_id);

		  } else {
		  			Session::flash('message', 'Datos No Eliminados');
		  			Session::flash('class','alert alert-error');
					return Redirect::to('relacion/edit'.$relaciondocente->docente_id);
		  }
		  

		//return Redirect::route('RelacionDocentes.index');
	}

	/**
	 * function guardarsaber
	 *
	 * 
	 * @return Response
	 */
	public function guardarsaber()
	{
		
		$docente=Docente::find(Input::get('docente_id'));
	
		$relaciondocente=RelacionDocente::find(Input::get('relaciondocente'));
		
		$saber=Sabere::where('codigo','=',Input::get('nombreunidad'))->first();
	
		$saberdocente= new SaberDocente;
		$saberdocente->docente()->associate($docente);
		$saberdocente->saber()->associate($saber);
		$saberdocente->relaciondocente()->associate($relaciondocente);
		$saberdocente->numerosecciones=Input::get('numeroSecciones');
		$saberdocente->sabere_id=$saber->id;
		$saberdocente->docente_id=$docente->id;
		$saberdocente->relaciondocente_id=$relaciondocente->id;
		$numerosecciones=Input::get('numeroSecciones');
		$horassemanales=$saber->horassemanales;
		$horasacademicas= $horassemanales * $numerosecciones;
		
		if ($saberdocente->save()) {
			
					$relaciondocente->horasacademicas = $relaciondocente->horasacademicas + $horasacademicas;
					$relaciondocente->horasadministrativas= $relaciondocente->totalhoras - $relaciondocente->horasacademicas;
					$relaciondocente->save();
					Session::flash('message', 'Unidad Curricular Guardada.');
		  			Session::flash('class','alert alert-success');
					return Redirect::to('relacion/edit'.$relaciondocente->docente_id);

		} else {
					Session::flash('message', 'Unidad Curricular No Guardada.');
		  			Session::flash('class','alert alert-error');
					return Redirect::to('relacion/edit'.$relaciondocente->docente_id);
		}
		

		// $i=0;
		// $datos=Input::all();
		// $codigo=Input::get('nombre');
		// $numeroSecciones=Input::get('numeroSecciones');
		// 			foreach ($codigo as $value) {
		// 					$codigoSaber=DB::table('Saberes')->where('codigo',$value)->first();
							
		// 					$saberes[]=array(
		// 									'nombre' =>$codigoSaber->nombre,
		// 									'numeroSecciones' => $numeroSecciones[$i] ,
		// 									'codigoSaber' => $value,
		// 									'cedulaDocente' => $datos['cedulaDocente'],
		// 									'idrelaciondocentedocente' =>$datos['idrelacionDocenteDocente']
		// 					);
		// 					$i++;
		// 			}


		// 	if (SaberDocente::insert($saberes)) {
		// 		Session::flash('agregarsaber', 'Datos Agregados');
		// 		return Redirect::to('editarrelacion'.$datos['cedulaDocente']);
		// 	} else {
		// 		Session::flash('agregarsaber', 'Datos No Agregados');
		// 		return Redirect::to('editarrelacion'.$datos['cedulaDocente'])->with('agregarsaber', 'Datos No Agregados.');
		// 	}
			


	}
	/**
	 * function relaciondocenteeditarsaberes
	 *
	 * 
	 * @return Response
	 */
	public function relaciondocenteeditarsaberes()
	{
		//var_dump(Input::all());
		$numeroHorasAcademicas=Input::get('numeroHorasAcademicas');
		$numeroHorasAdministrativas=Input::get('numeroHorasAdministrativas');
		$totalHoras=Input::get('totalHoras');
		$nombre=Input::get('nombre');
		$numeroSecciones=Input::get('numeroSecciones');
		$idsaber=Input::get('idsaber');
		$idrdd=Input::get('idrdd');
		$cedulaDocente=Input::get('cedula');
		//var_dump(Input::all());
		//var_dump(Input::get('numeroSecciones'));
		
		$html=<<<EOD
		 			<form action="actualizarsaberrelacion" method="get" accept-charset="utf-8" id="formeditar4">
		 				<label>N<sup>o</sup> de Horas Academicas: </label>
						<input type="number" id="numeroHorasAcademicas" name="numeroHorasAcademicas" max="$totalHoras"  min="0" size="3"  required value="$numeroHorasAcademicas"  />&nbsp;&nbsp;
		 				<label>N<sup>o</sup> de Horas Administrativas: </label>
						<input type="number" id="numeroHorasAdministrativas" name="numeroHorasAdministrativas"  max="$totalHoras" min="0" size="3"  required value="$numeroHorasAdministrativas" /><br/>
						<label>Total de Horas: </label>
						<input type="number" id="totalHoras"  disabled name="totalHoras" max="100" min="0" size="3"   required value="$totalHoras" /><br/>	
						<label><strong> Saber:</strong> $nombre&nbsp;&nbsp;&nbsp;&nbsp; <strong> N<sup>o</sup> Secciones:</strong>
				  		<input type="number" name="numeroSecciones" id="numeroSecciones" class="numeroSecciones" value="$numeroSecciones" placeholder="" min="1" max="12"><br>
				  		<input type="hidden" name="id" id="id" value="$idsaber">
				  		<input type="hidden" name="cedulaDocente" id="cedulaDocente" value="$cedulaDocente">
				  		<input type="hidden" name="idrelaciondocentedocente" id="idrelaciondocentedocente" value="$idrdd">
				  		<input type="submit" name="" value="Editar"> <input type="reset" name="" value="Restaurar">
				  		<input type="button" name="" id="close" value="Cerrar">
		 			</form>

		 			<script type="text/javascript" charset="utf-8" async defer>
		 				 $('#close').click(function(e){
    						e.preventDefault();
   	         				$('#popup').fadeOut(10);
        					$('#formeditar4').remove();
        
    					});
		 			</script>
EOD;
		return $html;
	}

	/**
	 * function datosrelaciondocentedocente
	 *
	 * 
	 * @return Response
	 */

	public function datosrelaciondocentedocente()
	{
		
		$cedula=Input::get('cedula');
		$relacion=RelacionDocente::where('estado','=','Activo')->first();
		$docente=Docente::where('cedula', '=' ,$cedula)->first();

				if ($docente) {
								
								
								if (RelacionDocenteDocente::where('cedulaDocente','=',$cedula)->where('idRelacion','=',$relacion->id)->first()) {
										
									$docente="el docente tiene una relacion previa";
									return $docente;

								} else {
											
											 if ($docente->dedicacion === 'Dedicacion Exclusiva') $docente->tiempo = 36;
											 if ($docente->dedicacion === 'Tiempo Completo') $docente->tiempo = 30;
											 if ($docente->dedicacion === 'Medio Tiempo') $docente->tiempo = 18;
											 if ($docente->dedicacion === 'Tiempo Convencional') $docente->tiempo = 8;
											 $resultado=DB::table('Pregrados')->where('cedulaDocente',$cedula)->get();
											
											 foreach ($resultado as $value) {

															$pregrados[]= $value->pregrado;
											 }
											 $docente->pregrados=$pregrados;

											 $resultado=DB::table('Postgrados')->where('cedulaDocente',$cedula)->get();
												if (!$resultado) {
																	$postgrados="vacio";
												}
												else{
																	foreach ($resultado as $value) {
																	$postgrados[]= $value->postgrado;
																	}
																	$docente->postgrados=$postgrados;
												}

											
								}
								
								return $docente;
				}
				else
						{
							$docente="no hay registro con esa cedula";
							return $docente;
				}
		
		
	}

	/**
	 * function actualizarsaberrelacion
	 *
	 * 
	 * @return Response
	 */

	public function actualizarsaberrelacion()
	{
		$cedula=Input::get('cedulaDocente');
		$idsaber=Input::get('id');
		$numeroSecciones=Input::get('numeroSecciones');
		$idrelaciondocentedocente=Input::get('idrelaciondocentedocente');
		$rdd=RelacionDocenteDocente::find($idrelaciondocentedocente);
		$rdd->numeroHorasAcademicas=Input::get('numeroHorasAcademicas');
		$rdd->numeroHorasAdministrativas=Input::get('numeroHorasAdministrativas');
		//$rdd->totalHoras=Input::get('totalHoras');

		//var_dump(Input::all());
		if ($rdd->save()) {
				$saber=SaberDocente::find($idsaber);
				
				$saber->numeroSecciones=$numeroSecciones;
				if($saber->save())
				{
				Session::flash('esa', 'Datos Editados');
				return Redirect::to('editarrelacion'.$cedula);
			   }
		} else {
				Session::flash('esa', 'Datos No Editados');
				return Redirect::to('editarrelacion'.$cedula);
		}
		
	}

	/**
	 * function horasemanal
	 *
	 * 
	 * @return Response
	 */
	public function horasemanal()

	{
		$codigo=Input::get('codigo');
		$numero=Sabere::where('codigo','=',$codigo)->first();
		return $numero->horassemanales;
	}

	/**
	 * function verrelacion
	 *
	 * 
	 * @return Response
	 */

	public function verrelacion()
	{
		$relacion = Relacion::where('estado','=', 'Activo')->first();
		$estados=$relacion->estado()->get();

		foreach ($estados as $value) {
			$departamento=Departamento::find($value->departamento_id);
			$data[]=['departamento' => $departamento->nombre,
					 'estado' => $value->estado
					 ];
		}
		
		return View::make('RelacionDocentes.verrelacion', ['relacion' => $relacion, 'estados' => $data, 'i' => 1]);
	}
	

	public function mensaje($id='')
		{
			return View::make('RelacionDocentes.message');
		}	

	public function aprobar($id='')
	{
		
		$estado=Estadorelacion::find($id);
		$data=[
				'estado' => 1,
				];
		if ($estado->update($data)) {
					Session::flash('message', 'Relación Aprobada.');
		  			Session::flash('class','alert alert-success');
					return Redirect::to('relacion/show');
		} else {
					Session::flash('message', 'Problemas Al Realizar la Operación.');
		  			Session::flash('class','alert alert-success');
					return Redirect::to('relacion/show');
		}
		
	
	}

}//fin class
