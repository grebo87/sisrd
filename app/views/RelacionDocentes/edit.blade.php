{{--muestra el menu relacion--}}
@extends('sisrd.sisrd')

@section('body')


<section id="seccion" >
<h3>Editar Relación Docente</h3>
<br>
	
	<div id="datospersonales"><fieldset><legend>Datos Personales Del Docente</legend><br /><br />
<br />	
	
	<label><strong>Docente: </strong> {{ $docente->primerapellido }} {{$docente->segundoapellido}} {{$docente->primernombre}} {{$docente->segundonombre}}</label> <br />
	<label><strong>Cedula:</strong>  {{$docente->cedula}}</label><br />
	<label><strong>Cargo: </strong> {{$docente->cargo}}</label> &nbsp;&nbsp;<label><strong>Dedicaión: </strong> {{$docente->dedicacion}}</label> <br />
	<label><strong>Categoria: </strong> {{$docente->categoria}}</label>&nbsp;&nbsp;<label><strong>Condicaión: </strong> {{$docente->condicion}}</label> <br />
	<label><strong>Departamento: </strong> {{$departamento->nombre}}</label>
	</fieldset>
	</div>

	<div id="datospregrados"><fieldset><legend>Datos Académicos</legend>
		<label><strong>Titúlo de Pregrado(s): </strong><br />
		@foreach($pregrados as $pregrado)
				{{$pregrado->pregrado}}<br />
		@endforeach

		</label><br />
		
		<label id="titulopost"><strong>Titúlo de Postgrados(s): </strong><br />
			@foreach($postgrados as $postgrado)
				{{$postgrado->postgrado}}<br />
			@endforeach
		</label><br />
		
	</fieldset>
	</div>

	
	<div id="datosrelacion"><fieldset><legend>Datos de la Relación</legend>
		<form action="actualizarrelacion" method="POST" class="pure-form pure-form-aligned" id="form">
		<label>N<sup>o</sup> de Horas Academicas: </label>
		<input type="number" id="horasAcademicas" readonly="" style="background-color: #fff; color: #000000;" name="horasAcademicas" max="{{$relacionDocente->totalhoras}}"  min="0" size="3"  required value="{{$relacionDocente->horasacademicas}}"  />&nbsp;&nbsp;
		<label>N<sup>o</sup> de Horas Administrativas: </label>
		<input type="number" id="horasAdministrativas" readonly="" style="background-color: #fff; color: #000000;" name="horasAdministrativas"  max="{{$relacionDocente->totalhoras}}" min="0" size="3"  required value="{{$relacionDocente->horasadministrativas}}" /><br/>
		<label>Total de Horas: </label>
		<input type="number" id="totaHoras" name="totaHoras" max="{{$relacionDocente->totalhoras}}" style="background-color: #fff; color: #000000;" min="0" size="3"  disabled=""  required value="{{$relacionDocente->totalhoras}}" /><br/>
		
		<label>Sede:</label>
		{{Form::select('sede',$sedes,$relacionDocente->sede,['required'])}}
		<br />
	
		{{Form::label('observacion','Observación')}}<br />
		<textarea id="observacion" name="observacion" rows="5" cols="15">{{$relacionDocente->observacion}}</textarea><br />
		<input type="hidden" id="relaciondocente_id" name="relaciondocente_id" value="{{$relacionDocente->id}}" />
		<input type="hidden" id="docente_id" name="docente_id" value="{{$docente->id}}" /><br>
		{{Form::submit('Editar',array('id'=>'editar','class' => 'pure-button pure-button-primary'))}}
		{{Form::close()}}
	
	</fieldset>
	</div>

	<div id="datossaberes" ><fieldset class="pure-form pure-form-aligned"><legend>Datos de lo(s) Uinidad(es) Curricular(es) a Impartir el Docente</legend>
		<br>

		<table id="sabertable" border="1" width="80%" >
			<caption>Lista de Uinidad(es) Curricular(es) Que Impartira El Docente</caption>
			<thead>
				<tr>
					<th>Uinidad</th>
					<th>N<sup>o</sup> Secciones</th>
					<th>Opción</th>
				</tr>
			</thead>
			<tbody>
				
		
		@foreach($saberdocente as $saber)
			
					
				<tr>
					<td>
							<?php $unidad=Sabere::find($saber->sabere_id); ?>
							<input type="hidden" name="unidad" value="{{$unidad->codigo}}">
							{{$unidad->unidad}}
					</td>
					<td>{{$saber->numerosecciones}}</td>
					<td><a href="eliminarsaberdocente/{{$saber->id}}/{{$relacionDocente->id}}" class="pure-button" onclick="return confirm('¿Esta seguro?')"  ><i class="glyphicon glyphicon-remove" > </i></a></td>
				</tr>
					
			@endforeach
			</tbody>
		</table>

			<br>
			<input type="button" id="saber" name="saber" value="Agregar Saber" class="pure-button"   />
		
	<div id="popup"  style="display:none;" class="pure-form pure-form-aligned"> 	 	
	 									<div class="popup_content"> 
	 											<div>
													@include('RelacionDocentes.agregarunidad')
												</div>       			
        								</div>
</div>	
		
		<div style="margin-left: 50%;text-align: center;" >
			<input type="submit" id="guardarsaber" form="form2" name="guardarsaber" value="Guardar" class="pure-button pure-button-primary" style="display:none;" />	
		</div>
		</form>
	</fieldset>
	</div>
	<input type="hidden" id="cedulaDocente" name="cedulaDocente" value="{{$docente->cedula}}" disabled="" />
	<input type="hidden" id="id" name="id" value="{{$relacionDocente->id}}" />


        	
</section>

@stop