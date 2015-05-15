{{--muestra la lista de las Unidades Curriculares--}}
@extends('sisrd.sisrd')
@section('body')
			<section >

					<h3>Listado de Unidades Curriculares</h3>
					<br>
					{{Form::label('saberdepartamentoAcademico','Departamento Acedémico')}}
					{{Form::select('saberdepartamentoAcademico', $departamentos, '' ,['required', 'class' => 'pure-button'])}}

					{{HTML::link('saber','Regresar',['required', 'class' => 'pure-button'])}}
					<br /><br /><br /><br />
					<div class="table">





					</div>

			</section>
@stop



