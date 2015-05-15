{{--muestra el listado de docentes por el departamento--}}
@extends('sisrd.sisrd')

@section('body')
	<section id="seccion">
			<h3>Listado de Docentes por Departamento Académico </h3><br>
			<label> Departamento Académico </label>
			{{Form::select('departamentoAcademico', $departamentos, '',['required', 'id' => 'departamentoAcademico','class' =>'pure-button'])}} {{HTML::link('docente','Regresar',['class' =>'pure-button'])}}
			<br /><br />
			<div class="table">
					<br>
			</div>

	</section>

@stop

