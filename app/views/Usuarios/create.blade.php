{{--Muestra el formulario de registro del Usuario --}}
@extends('sisrd.sisrd')




@section('body')
<section id="seccion">

	<br>
	<h3>Registro Usuario</h3> <br>
	<form action="{{ url('user/tipo') }}" id="form_administrativo" method="POST" class="pure-form pure-form-aligned">
			
			{{ Form::label('tipousuario','Tipo de Usuario') }}
			{{ Form::select('tipousuario',['' => 'Seleccione', 'Administrativo' => 'Administrativo', 'Docente' => 'Docente' ], '', ['required', 'id' => 'tipousuario','class' => 'pure-button']) }} <br>

         


            {{Form::submit('Siguiente',['class' => 'pure-button pure-button-primary', 'disabled','id' => 'siguiente'])}} {{HTML::link('user','Regresar',['class' => 'pure-button'])}}
    {{ Form::close() }}


     
</section>

@stop