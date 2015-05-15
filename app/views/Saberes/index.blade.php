{{--muestra el menu  Unidad Curricular--}}
@extends('sisrd.sisrd')

@section('body')

<br>
	<div class="panel">
	
	<pre class="panel-titulo"><h3>Opciones Unidad Curricular</h3> </pre><br>
		<ul>
			<li><a href="{{url('saber/create')}}" class="button-xsmall pure-button" >Registrar Unidad Curricular</a></li><br>
			<li><a href="{{url('saber/show')}}" class="button-xsmall pure-button" >Visualizar Unidad Curricular</a></li><br>
		</ul>
		
		

</div>



@stop