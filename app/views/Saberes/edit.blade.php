{{--meustra la Unidad Curricular a editar--}}
@extends('sisrd.sisrd')

@section('body')
  
           <h3>Editar Unidad Curricular</h3>
           <br>
           {{ Form::open(array('action' => 'SaberesController@update', 'class' => 'pure-form pure-form-aligned')) }}

	                    {{ Form::label('nombre', 'Unidad Curricular') }}
						<input type="text" name="unidad" id="unidad" value="{{$saber->unidad}}" required  />
						<br /><br />
						{{Form::label('horasSemanales','Horas Semanales')}}
						<input type="number" name="horassemanales" id="horassemanales" value="{{$saber->horassemanales}}" required />
						<br /><br />
						{{Form::label('departamentoAcademico','Departamento Acedémico')}}
						{{Form::select('departamento_id', $departamentos, $saber->departamento_id ,['required'])}}
						<br /><br />
						{{Form::label('carrera','Carrera')}}
						{{Form::select('carrera',['PNF' => 'PNF', 'TSU' => 'TSU'],$saber->carrera,['required'])}}
						<br /><br />
						{{Form::label('codigo','Código')}}
						<input type="text" name="codigo" id="codigo" value="{{$saber->codigo}}" required />
						<input type="hidden" name="oldcodigo" id="oldcodigo" value="{{$saber->codigo}}">
						<br /><br />
						{{ Form::submit('Editar',['class' => 'pure-button pure-button-primary']) }}  {{Form::reset('Restaurar',['class' => 'pure-button'])}} {{HTML::link('saber/show','Regresar',['class' => 'pure-button'])}}

			{{ Form::close() }}

	</section>
@stop