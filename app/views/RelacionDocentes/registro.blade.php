{{--Muestra el formulario de registro de la relacion del docente --}}

@extends('sisrd.sisrd')

@section('body')

		<h3>Registro Relación</h3><br><br>
<form action="guardarrelacion" method="POST"  id="form" class="pure-form pure-form-aligned">		
		<fieldset>
			<legend>Datos Personales Del Docente</legend><br>

		
				<table width="100%" cellpadding="0" >
					<thead>
						<tr>
							<th>Nombre Completo</th>
							<th>Cedula</th>
							<th>Dedicación</th>
							<th>Categoria</th>
							<th>Condición</th>
							<th>Departamento Académico</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{ $docente->primerapellido }}  {{ $docente->segundoapellido }}  {{ $docente->primernombre }}  {{ $docente->segundonombre }}  </td>
							<td>{{ $docente->cedula }}</td>
							<td>{{ $docente->dedicacion }}</td>
							<td>{{ $docente->categoria }}</td>
							<td>{{ $docente->condicion }}</td>
							<td id="departamento">{{ $departamento->nombre }}</td>
							
						</tr>
					</tbody>
				</table>
				<br><br>
				<table>
					<thead>
						<tr>
							<th>#</th>
							<th>Titúlo(s) de Pregrado(s)</th>
						</tr>
					</thead>
					<tbody>							
								@foreach ($pregrados as $value) 
									<tr>
										<td>{{ $i++ }}</td>
										<td> {{ $value->pregrado }}</td>
									</tr>	
							     @endforeach					
					</tbody>
				</table>
				<br><br>
				<table>
					<thead>
						<tr>
							<th>#</th>
							<th>Titúlo(s) de Postgrado(s)</th>
						</tr>
					</thead>
					<tbody>							
								@foreach ($postgrados as $key) 
									<tr>
										<td>{{ $j++ }}</td>
										<td> {{ $key->postgrado }}</td>
									</tr>	
							     @endforeach					
					</tbody>
				</table>
<div id="popup" style="display:none;" class="pure-form pure-form-aligned"> 
@include('RelacionDocentes.agregarsaber')
</div>				
				<br>
		</fieldset><br>

		<fieldset>
					<legend>Datos de la Relación</legend><br>
					
							<label>N<sup>o</sup> de Horas Academicas: </label>
							<input type="number" id="horasAcademicas" name="horasAcademicas"   max="100" min="0" size="3"  required value="0" readonly="" style="background-color: #fff; color: #000000;"  />&nbsp;&nbsp;
							<label>N<sup>o</sup> de Horas Administrativas: </label>
							<input type="number" id="horasAdministrativas" name="horasAdministrativas" max="100" min="0" size="3"  required value="{{ $docente->tiempo }}" readonly="" style="background-color: #fff; color: #000000;" /><br/>
							<label>Total de Horas: </label>
							<input type="number" id="totaHoras"  name="totaHoras" max="100" min="0" size="3" value="{{ $docente->tiempo }}"   required readonly="" style="background-color: #fff; color: #000000;" /><br/>
							<br><label>Sede:</label>
							{{Form::select('sede',$sedes,'',['required'])}} <br>
							{{Form::label('observacion','Observación')}}<br />
							{{Form::textarea('observacion','',array('cols'=>'40','rows'=>'5'))}}<br />
							<input  type="hidden" id="docente_id" name="docente_id" value="{{ $docente->id }}" />
							<input  type="hidden" id="relacion_id" name="relacion_id" value="{{ $relacion->id }}" />


		</fieldset>
		<br>


		<fieldset>
			<legend>Datos de la(s) Unidad(es) Curricular(es)</legend><br>
					
							<input type="button" id="saber"  name="saber" value="Agregar Unidad"  class="pure-button"  /><br><br>
					
					

							<table  id="sabertable" border="1">
										<caption>Lista de la(s) Unidad(es) Curricular(es) Que Impartira El Docente</caption>
										<thead>
											<tr>
												<th>Codigó</th>
												<th>Unidad Curricular</th>
												<th>Horas Semanales</th>
												<th>N<sup>o</sup> de Secciones</th>
												<th>Opción</th>
											</tr>
										</thead>
										<tbody>
									
										</tbody>
							</table><br>
							{{Form::submit('Guardar',array('disabled'=>'disabled','id'=>'guardar','class' => 'pure-button pure-button-primary'))}}  {{HTML::link('relacion','Regresar',['class' => 'pure-button'])}} <br>
				
		</fieldset>
</form>	
<input type="hidden" name="valida" id="valida" value="0" placeholder="">

@stop								
							