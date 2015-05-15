{{--Muestra el formulario de registro del usuario docente --}}
@extends('sisrd.sisrd')




@section('body')
<section id="seccion">

	<br>
	<h3>Registro de Usuario</h3> <br>

	<form action="{{ url('user/storedocente') }}" method="POST" class="pure-form pure-form-aligned">
			<div id="datospersonales">
					<fieldset>
							<legend>Datos Personales</legend>

									{{Form::label('cedula','Cedula')}}
									{{Form::text('cedula','',[ 'required','pattern' => '[0-9]{6,15}', 'title' => 'Solo numeros'])}} <input type="button" name="buscar" id="buscar" value="Buscar" class="pure-button">
									<div id="docente">
										<label for="nombres"> <strong> Nombre Completo:</strong> <span id="nombre_completo"></span></label> <br>
										<label for="cargo"><strong>Cargo:</strong> <span id="cargo_docente"></span></label><br>
										<label for="departamento"><strong>Dapartamento Académico:</strong> <span id="depart_docente"></span></label><br>
									</div>
									
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
            


			
            {{Form::submit('Guardar',['class' => 'pure-button pure-button-primary', 'id' => 'userdocente', 'disabled'])}} {{Form::reset('Limpiar',['class' => 'pure-button'])}} {{HTML::link('user/create','Regresar',['class' => 'pure-button'])}}
    {{ Form::close() }}


     
</section>

@stop