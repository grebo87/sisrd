{{--muestra el menu relacion--}}
@extends('sisrd.sisrd')

@section('body')
<br>
	<div class="panel">
		<pre class="panel-titulo"><h3>Opciones Relación Docente</h3> </pre><br>
		
		<ul>
			<li><a href="{{url('relacion/create')}}" class="pure-button">Crear Relación</a></li><br />
			<li><a href="{{url('relacion/verrelacion')}}" class="pure-button">Ver Relación</a></li><br />
			<li><a href="{{url('relacion/registrar')}}" class="pure-button">Registrar Relación Docente</a></li><br />
			<li><a href="{{ url('relacion/show') }}" class="pure-button">Visualizar Relación Docente</a></li><br />
		</ul>
	</div>


@stop