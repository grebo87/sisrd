{{-- formulario de registro de Unidad Curricular --}}
@extends('sisrd.sisrd')

@section('body')
  

	
           <h3>Registro de Unidad Curricular</h3>
           <br>
           {{ Form::open(array('action' => 'SaberesController@store','class' => 'pure-form pure-form-aligned')) }}
           			<fieldset>
	               				 <legend>Datos de la Unidad Curricular</legend>                               

	                                    {{ Form::label('nombre', 'Unidad Curricular') }}
	                                    {{ Form::text('unidad','',array('required','placeholder' => 'Unidad Curricular')) }}
										<br /><br>
										{{Form::label('horasSemanales','Horas Semanales')}}
										{{Form::input('number','horassemanales','',array('required','placeholder' => 'numero'))}}
										<br /><br>
										{{Form::label('departamentoAcademico','Departamento Acedémico')}}
										{{Form::select('departamento_id', $departamentos, '' ,['required'])}}
										<br /><br>
										{{Form::label('carrera','Carrera')}}
										{{Form::select('carrera',['' => 'Seleccione','PNF' => 'PNF','TSU' => 'TSU'], '' ,['required'])}}
										<br /><br>
										{{Form::label('codigo','Código')}} 
										{{Form::text('codigo','',array('required'))}}
										<br /><br>
										{{ Form::submit('Guardar',['class' => 'pure-button pure-button-primary']) }} {{Form::reset('Limpiar',['class' => 'pure-button '])}} {{HTML::link('saber','Regresar',['class' => 'pure-button'])}}
					</fieldset>
		{{ Form::close() }} 
		   
    </section>
@stop


