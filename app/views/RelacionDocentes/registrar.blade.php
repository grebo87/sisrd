{{--Muestra el formulario de registro de la relacion del docente --}}

@extends('sisrd.sisrd')

@section('body')

<section  id="seccion">

			
	<h3>Registrar Relación Docente</h3><br>
	{{ Form::open(['url' => 'relacion/registro_relacion', 'class' => 'pure-form pure-form-aligned']) }}
		{{ Form::label('cedula', 'Ingrese La Cedula del Docente') }} <br>
		{{ Form::text('cedula','', ['placeholder' => 'Cedula', 'pattern' => '[0-9]{7,15}', 'title' => 'Solo números', 'autofocus', 'required']) }} <br>
		{{ Form::submit('Buscar',['class' => 'pure-button']) }}
	{{ Form::close() }}

</section>


          
@stop

