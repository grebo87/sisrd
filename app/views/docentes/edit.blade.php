{{--Muestra el formulario de editar del docente --}}

@extends('sisrd.sisrd')
@section('body')
<section id="seccion" class="pure-form pure-form-aligned">




		<h3>Editar Docente</h3>
		<br>
	    <div id="datospersonales"   ><fieldset id="per"><legend>Datos Personales  </legend>
		    <form method="POST" action="{{url('docente/updatedocente')}}" accept-charset="UTF-8" class="formdatos">
		        <label>Primer Nombre </label>  <input type="text" name="primernombre" id="primernombre" value="{{$docente->primernombre}}" required  />
		        <label>Segundo Nombre</label><input type="text" name="segundonombre" id="segundonombre" value="{{$docente->segundonombre}}"  /><br />
		        <label>Primer Apellido</label><input type="text" name="primerapellido" id="primerapellido" value="{{$docente->primerapellido}}" required />
		        <label>Segundo Apellido</label><input type="text" name="segundoapellido" id="segundoapellido" value="{{$docente->segundoapellido}}"  /><br />
		        <label>Cedula</label><input type="text" name="cedula" id="cedula" value="{{$docente->cedula}}"  required/>
		        <label>Cargo</label><input type="text" name="cargo" id="cargo" value="{{$docente->cargo}}"  required/><br />
		        <label>Dedicación</label>
				{{Form::select('dedicacion',array(''=> 'Seleccione', 'Dedicacion Exclusiva' => 'Dedicacion Exclusiva','Tiempo Completo' => 'Tiempo Completo','Medio Tiempo' => 'Medio Tiempo', 'Tiempo Convencional' => 'Tiempo Convencional'),$docente->dedicacion,array('required'))}}
				<label>Categoria</label>
				{{Form::select('categoria',array(''=> 'Seleccione', 'Instructor' => 'Instructor','Asistente' => 'Asistente','Asociado' => 'Asociado', 'Agregado' => 'Agregado','Titular' => 'Titular'),$docente->categoria,array('required'))}}
				<br><label>Condicion</label>
				{{Form::select('condicion',array('' => 'Seleccione','Docente Ordinario' => 'Docente Ordinario','Auxiliar Docente Ordinario' => 'Auxiliar Docente Ordinario','Docente Contratado' => 'Docente Contratado','Auxiliar Docente Contratado' => 'Auxiliar Docente Contratado','Titular' => 'Titular'),$docente->condicion,array('required'))}}
				<br><label>Fecha Ingreso</label><input type="date" name="fechaingreso" id="fechaingreso" value="{{$docente->fechaingreso}}"  required/><br />
				<label>Estado</label>
				{{Form::select('status',array('' => 'Seleccione','Activo' => 'Activo', 'Jubilado' => 'Jubilado','Retirado' => 'Retirado'),$docente->status,array('required'))}}
				<label>Observación</label><br /><textarea id="observacion" name="observacion" rows="5" cols="20" >{{$docente->observacion}}</textarea> <br>
				<label>Sede</label>
				{{Form::select('sede', $sedes, $docente->sede ,['required'])}}
				<br><label>Departamento Académico</label>
				{{Form::select('departamento_id', $departamentos, $docente->departamentoacademico, ['required'])}}
				<br><input type="submit" value="Editar" class="pure-button pure-button-primary">  {{Form::reset('Restaurar',['class' => 'pure-button'])}}
				<input type="hidden" name="id" id="id" value="{{$docente->id}}"  />
			</form>

		<br>
		</fieldset>
		</div>

        <div id="datosacademicos" ><fieldset style="text-align: center;"><legend>Datos Académicos</legend>

					<h3>Titúlo(s) de Pregrado(s)</h3>
					<table width="70%" border="1">
								<thead>
									<tr>
										<th>#</th>
										<th>Pregrado</th>
										<th>Opción</th>
									</tr>
								</thead>
								<tbody>
								<div id="popup13" style="display:none;"  class="pure-form pure-form-aligned" > 

											<div id="form_editar_pregrado" class="popup_content" >
					
											</div>

								</div>
										@foreach ($pregrados as $value) 
							
												<tr>
													<td>{{ $i++ }}</td>
													<td>{{ $value->pregrado }}</td>
													<td> <span id="{{ $value->id }}" class="editarpregrado glyphicon glyphicon-edit pure-button" > </span></td>
												</tr>								
			       
		        						@endforeach
		        				</tbody>
		
					</table>
					<div id="popup1" style="display:none;" class="pure-form pure-form-aligned"> 
	 	
				 			<div class="popup_content">  
				 						     <h3>Agregar Titulo</h3>              
			               	   <form action="{{url('docente/agregarpregrado')}}"  class="pure-form pure-form-aligned" method="POST" accept-charset="utf-8" id="pos">
								   <label>Titúlo de Pregrado <input type='text' id='pregrado[]' name='pregrado[]' required/></label>
							       <input type="hidden" name="id_docente1" id="id_docente1" value="{{$docente->id}}">
							       <input type='submit'value='Agregar'  id="agregarpost"  class="pure-button pure-button-primary">	
							       <input type="button" name="" id="close1" value="Cerrar" class="pure-button "> 
						        </form>
			        		</div>           
	 				</div>	
			<br>
			{{Form::label('pregrado','Agregar Titúlo de Pregrado')}} <span id="pre"  class="a glyphicon glyphicon-plus pure-button" ></span><br/><br>
			
					
<hr><br>

	<div id="postgra">
	@if($postgrados)
						<h3>Titúlo(s) de Postgrado(s)</h3>
					<table width="70%" border="1">
								<thead>
									<tr>
										<th>#</th>
										<th>Postgrados</th>
										<th>Opción</th>
									</tr>
								</thead>
								<tbody>
								<div id="popup12" style="display:none;"  class="pure-form pure-form-aligned" > 

											<div id="form_editar_postgrado" class="popup_content" >
					
											</div>

								</div>
										@foreach ($postgrados as $key) 
							
												<tr>
													<td>{{ $j++ }}</td>
													<td>{{ $key->postgrado }}</td>
													<td> <span  id="{{ $key->id }}" class="editarpostgrado glyphicon glyphicon-edit pure-button" > </span></td>
												</tr>								
			       
		        						@endforeach
		        				</tbody>
		
					</table>
					

	<br />
			<div id="popup" style="display:none;" class="pure-form pure-form-aligned"> 
	 	
	 			<div class="popup_content">  
	 						       <h3>Agregar Titulo</h3>            
               	   <form action="{{url('docente/agragarpostgrado')}}"  class="pure-form pure-form-aligned" method="POST" accept-charset="utf-8" id="pos">
					   <label>Titúlo de Postgrado <input type='text' id='postgrado[]' name='postgrado[]' required/></label>
				       <input type="hidden" name="id_docente3" id="id_docente3" value="{{$docente->id}}">
				       <input type='submit'value='Agregar'  id="agregarpost"  class="pure-button pure-button-primary">	
				       <input type="button" name="" id="close" value="Cerrar" class="pure-button "> 
			        </form>
        		</div>           
	 		</div>	
	
	</div>
	{{Form::label('postgrado','Agregar Titúlo de Postgrado')}}
			<span  id="post" class="d glyphicon glyphicon-plus pure-button"></span><br><br>
					
			
			
	@else
			<div id="popup" style="display:none;" class="pure-form pure-form-aligned"> 
	 	
	 			<div class="popup_content">  
	 						         <h3>Agregar Titulo</h3>          
               	   <form action="{{url('docente/agragarpostgrado')}}"  class="pure-form pure-form-aligned" method="POST" accept-charset="utf-8" id="pos">
					   <label>Titúlo de Postgrado <input type='text' id='postgrado[]' name='postgrado[]' required /></label>
				       <input type="hidden" name="cedula" id="cedula" value="{{$docente->cedula}}">
				       <input type='submit'value='Agregar'  id="agregarpost"  class="pure-button pure-button-primary">	
				       <input type="button" name="" id="close" value="Cerrar" class="pure-button "> 
			        </form>
        		</div>           
	 		</div>	
	<br>
	{{Form::label('postgrado','Agregar Titúlo de Postgrado')}}
			<span  id="post" class="d glyphicon glyphicon-plus"></span> <br><br>
			
		
			
	@endif	
	
</fieldset>	
{{HTML::link('docente/show','Regresar',['class' => 'pure-button'])}}
</div>

</section>
@stop