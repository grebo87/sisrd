{{--muestra la lista de relaciones docente--}}
@extends('sisrd.sisrd')
@section('body')
	<section>
	
				{{Session::get('eliminarrelacion')}}
					<h3>Listado de Relaciones Docente</h3>
					<br>
					<label> Departamento Académico </label>

					{{Form::select('departamentorelacion',$departamentos,'', ['required','id' => 'departamentorelacion', 'class' => 'pure-button'])}}
					{{HTML::link('relacion','Regresar', ['class' => 'pure-button'])}}
					<br /><br /><br /><br />

					<div class="table">
					</div>

	</section>


@stop