{{--Muestra el formulario de registro del docente --}}
@extends('sisrd.sisrd')




@section('body')
<section id="seccion">

	<br>
	<h3>Registro del Personal Docente</h3>
	<form action="{{ url('docente/store') }}" method="POST" class="pure-form pure-form-aligned">
			<div id="datospersonales">
					<fieldset>
							<legend>Datos Personales</legend>

									{{Form::label('primerNombre','Primer Nombre')}}
									{{Form::text('primernombre','',array('required'))}}   
									{{Form::label('segundoNombre','Segundo Nombre')}}
									{{Form::text('segundonombre')}}<br />
									{{Form::label('primerApellido','Primer Apellido')}}
									{{Form::text('primerapellido','',array('required'))}}
									{{Form::label('segundoApellido','Segundo Apellido')}}
									{{Form::text('segundoapellido')}}<br />
									{{Form::label('cedula','Cedula')}}
									{{Form::text('cedula','',[ 'required','pattern' => '[0-9]{6,15}', 'title' => 'Solo numeros'])}}
									{{Form::label('cargo','Cargo')}} 
									{{Form::text('cargo','',array('required'))}}<br />
									{{Form::label('dedicacion','Dedicaión')}}
									{{Form::select('dedicacion',array(''=> 'Seleccione', 'Dedicacion Exclusiva' => 'Dedicacion Exclusiva','Tiempo Completo' => 'Tiempo Completo','Medio Tiempo' => 'Medio Tiempo', 'Tiempo Convencional' => 'Tiempo Convencional'),'',array('required'))}}
									{{Form::label('categoria','Categoria')}}
									{{Form::select('categoria',array(''=> 'Seleccione', 'Instructor' => 'Instructor','Asistente' => 'Asistente','Asociado' => 'Asociado', 'Agregado' => 'Agregado','Titular' => 'Titular'),'',array('required'))}}<br>
									{{Form::label('condicion','Condición')}}
									{{Form::select('condicion',array('' => 'Seleccione','Docente Ordinario' => 'Docente Ordinario','Auxiliar Docente Ordinario' => 'Auxiliar Docente Ordinario','Docente Contratado' => 'Docente Contratado','Auxiliar Docente Contratado' => 'Auxiliar Docente Contratado','Titular' => 'Titular'),'',array('required'))}}<br>
									{{Form::label('fechaIngreso','Fecha de Igreso')}}
									{{Form::input('date','fechaingreso','',array('required'))}}<br />
					
									{{Form::label('status','Estado')}}
									{{Form::select('status',array('' => 'Seleccione','Activo' => 'Activo', 'Jubilado' => 'Jubilado','Retirado' => 'Retirado'),'',array('required'))}}<br />
									{{Form::label('observacion','Observación')}}<br />
									{{Form::textarea('observacion','',array('cols'=>'20','rows'=>'7'))}}<br />
									{{Form::label('sede','Sede')}}
									{{Form::select('sede', $data['sedes'], '', ['required'])}} <br>
									{{Form::label('departamentoAcademico','Departamento Acedémico')}}
									{{Form::select('departamentoicademico', $data['departamentos'], '' ,['required'])}}
					</fieldset>
			</div>

            <div id="datosacademicos">
               <div id="popup" style="display:none;" class="pure-form pure-form-aligned"> 	 	
	 						<div class="popup_content">  
	 									<div>
	 											<h3>Agregar Titulo</h3>
	 											<label id="titulo"></label>
	 											<input type='text' id='nombre' name='nombre' /><br>  <span id="mns"></span>
	 							
	 									</div>             
        					</div>
        					<input type="button" name="" id="agregar" value="Agregar" class="pure-button pure-button-primary"> 
        					{{Form::reset('Limpiar',['class' => 'pure-button','id' => 'limpiar'])}} 
        					<input type="button" name="" id="close" value="Cerrar" class="pure-button "> 
           
	 			</div>
            		<fieldset>
            				<legend>Datos Académicos</legend>

					                <div id="pregra">
								            {{Form::label('pregrado','Titúlo de Pregrado')}}
								            {{Form::text('pregrado[]','',array('required' => 'required','id'=>'pregrado[]'))}} Otro<img src="{{URL()}}/img/plus1.png" height="16" width="16" id="pre" class="d"> <br/>
						
						            </div>
					                <div id="preg">
					
						
					                </div>	
					                <div id="postgra">
							                {{Form::label('postgrado','Titúlo de Postgrado')}}
							                {{Form::text('postgrado[]','',array('id'=>'postgrado[]'))}} Otro<img src="{{URL()}}/img/plus1.png" height="16" width="16" id="post" class="d">
						
						                      <br/>
						            </div>
					                <div id="postg">
						
					                </div>	
            		</fieldset>
            </div>



            {{Form::submit('Guardar',['class' => 'pure-button pure-button-primary'])}} {{Form::reset('Limpiar',['class' => 'pure-button'])}} {{HTML::link('docente','Regresar',['class' => 'pure-button'])}}
    {{ Form::close() }}


     
</section>

@stop