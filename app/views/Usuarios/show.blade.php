{{--Muestra el formulario de registro del Usuario Administrativo --}}
@extends('sisrd.sisrd')


@section('body')
<section id="seccion">
						<h3>Registro de Usuario</h3> <br>
						{{ Form::label('tipousuario','Tipo de Usuario') }}
						{{ Form::select('tipousuario',['' => 'Seleccione', 'Administrativo' => 'Administrativo', 'Docente' => 'Docente' ], '', ['required', 'id' => 'tipousuario','class' => 'pure-button']) }} <br>
						<br /><br />


</section>

@stop