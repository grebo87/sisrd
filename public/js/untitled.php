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




$('#cedula').keyup(function(){
								var cedula=document.getElementById('cedula').value; 

								if(cedula.length == '') //IF cedula =''
															{
																	$('#saber').attr('disabled','disabled');
																	$('#respuesta').text('Debe introducir una Cedula');
																	$('#docente').text('');
																	$('#cargo').text('');
																	$('#dedicacion').text('');
																	$('#categoria').text('');
																	$('#condicion').text('');
																	$('#pregrados').text('');
																	$('#postgrados').text('');
																	$('#departamento').text('');
																	//$('#respuesta').text('');
																	$('#totaHoras').val('');
																	$('#cedulaDocente').attr('value','');
																	$('#saber').attr('disabled','disabled' );
																	
																	document.getElementById('cedula').focus();

								} //FIN IF cedula =''
								else
								{



									$.post('datosrelaciondocentedocente', { cedula : cedula  }, function(resp) {
									

														if (resp == 'no hay registro con esa cedula')
														 {
														 		$('#respuesta').text('No Hay Registros Relacionados con la Cedula');
																$('#docente').text('');
																$('#cargo').text('');
																$('#dedicacion').text('');
																$('#categoria').text('');
																$('#condicion').text('');
																$('#pregrados').text('');
																$('#postgrados').text('');
																$('#departamento').text('');
																//$('#respuesta').text('');
																$('#totaHoras').val('');
																$('#cedulaDocente').attr('value','');
																$('#saber').attr('disabled','disabled' );
																
														 } 
														else
														 	{
														 		if (resp == "el docente tiene una relacion previa")
														 		 {
														 		 			$('#respuesta').text('El Docente ya tiene una Relación Cargada');
																			$('#docente').text('');
																			$('#cargo').text('');
																			$('#dedicacion').text('');
																			$('#categoria').text('');
																			$('#condicion').text('');
																			$('#pregrados').text('');
																			$('#postgrados').text('');
																			$('#departamento').text('');
																			//$('#respuesta').text('');
																			$('#totaHoras').val('');
																			$('#cedulaDocente').attr('value','');
																			$('#saber').attr('disabled','disabled' );			
														 		 }
														 		 else
														 		 {
														 		 	$('#respuesta').text('');
																	$('#docente').text(resp.primerNombre+' '+resp.segundoNombre+' '+resp.primerApellido+' '+resp.segundoApellido);
																	$('#cargo').text(resp.cargo);
																	$('#dedicacion').text(resp.dedicacion);
																	$('#categoria').text(resp.categoria);
																	$('#condicion').text(resp.condicion);
																	$('#departamento').text(resp.departamentoAcademico);
																	$('#cedulaDocente').attr('value',resp.cedula);
																	$('#totaHoras').val(resp.tiempo);
																	$('#totalHoras').val(resp.tiempo);
																	$('#saber').removeAttr('disabled');	
																	
																	$('#pregrados').text('');
																	var j=1;
																	for (var i = 0; i < resp.pregrados.length; i++) {//for
																												
																											$('#pregrados').append(j+++". "+resp.pregrados[i]+"<br>");
																	}//FIN for
																	if (!resp.postgrados)
																	 {
																	 	$('#postgrados').text('');
																		$('#titulopost').hide();
																	 } 
																	 else{
																	 		$('#postgrados').show();
																			$('#titulopost').show();
																			$('#postgrados').text('');
																			var j=1;
																			for (var i = 0; i < resp.postgrados.length; i++) {//for
																																																						
																											$('#postgrados').append(j+++". "+resp.postgrados[i]+"<br>");
																			}//FIN for

																			$('#saber').removeAttr('disabled');
																	 }
														 		 }
														 			
																	
														 	}
														
									});
							    }
								
						});//FIN keyup