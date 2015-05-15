
{{-- formulario de registro de Unidad Curricular --}}
@extends('sisrd.sisrd')

@section('body')
<section>
<a href="crearsede" class ='pure-button'  >Agregar Sede</a>
<a href="config" class ='pure-button' >Regresar</a>
<br>
<br>

<br>
<h1>Lista de las Sedes de la UPTP "Luis Mariano Rivera"</h1>

<table id="data" class="display" border="1">
	
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Opción</th>
		</tr>
	</thead>
	<tbody>
	@foreach($sedes as $sede)
		<tr>
			<td>{{$cont++}}</td>
			<td>{{$sede->nombre}}</td>
			<td><a href="editarsede{{$sede->id}}">Editar</a></td>
		</tr>
	@endforeach

	</tbody>
</table>


</section>
@stop

<script  type="text/javascript" charset="utf-8" >
	
	$(document).ready(function(){

		$('#data').dataTable(); 
	});
</script>