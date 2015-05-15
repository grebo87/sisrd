{{--Muestra el formulario de registro del Usuario Administrativo --}}
@extends('sisrd.sisrd')




@section('body')
<section id="seccion">

	<br>
	<h3>Registro de Usuario</h3> <br>

	<form action="{{ url('user/storeadmin') }}" method="POST" class="pure-form pure-form-aligned">
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
									
									
									{{Form::label('observacion','Observación')}}<br />
									{{Form::textarea('observacion','',array('cols'=>'20','rows'=>'7'))}}<br />
									
					</fieldset>
			</div>
			<div>	
					<fieldset> <legend>Datos de Usuario</legend><br>
								
								{{Form::label('username','Nombre de Usuario')}}
								{{Form::text('username','',array('required','placeholder' => 'Usuario'))}} <br>
								{{ Form::label('password', 'Contraseña') }}
          						{{ Form::password('password', ['placeholder' => 'Contraseña', 'class' => 'form-control', 'required']) }} <br>
          						{{ Form::label('password_confirmation', 'Repetir Contraseña') }}
          						{{ Form::password('password_confirmation', ['placeholder' => 'Repetir contraseña', 'class' => 'form-control', 'required']) }} <br>
          						{{ Form::label('email', 'Correo', '') }}
                                {{ Form::email('email', '', ['placeholder' => 'correo@correo.com', 'class' => 'form-control', 'required']) }}
					</fieldset>
				

			</div>
            


			
            {{Form::submit('Guardar',['class' => 'pure-button pure-button-primary'])}} {{Form::reset('Limpiar',['class' => 'pure-button'])}} {{HTML::link('user/create','Regresar',['class' => 'pure-button'])}}
    {{ Form::close() }}


     
</section>

@stop