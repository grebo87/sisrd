@extends('sisrd.sisrd')



@section('body')
<br>
<div class="panel">
			<pre class="panel-titulo"><h3>Opciones Docentes</h3> </pre>		
			<br />
			<ul>
				<li ><a href="{{ url('docente/create') }}" class="button-xsmall pure-button"  >Registrar Docente</a></li><br />
				<li ><a href="{{ url('docente/show') }}" class="button-xsmall pure-button" >Visualizar Docente</a></li><br />
			</ul>			
</div>
@stop

