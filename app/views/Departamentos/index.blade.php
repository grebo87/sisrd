{{-- formulario de registro de Unidad Curricular --}}
@extends('sisrd.sisrd')

@section('body')

<section>
<a href="creardepartamento" class="pure-button" >Agregar Departamento</a>   <a href="config" class="pure-button" >Regresar</a>
<br>
<br>
 <div>
	{{Session::get('msg')}}
</div>
<br>
<h1>Lista de Departamentos Académicos</h1>

<table id="data" class="display" border="1">
	
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Opción</th>
		</tr>
	</thead>
	<tbody>
	@foreach($departamentos as $departamento)
		<tr>
			<td>{{$cont++}}</td>
			<td>{{$departamento->nombre}}</td>
			<td><a href="editardepartamento{{$departamento->id}}">Editar</a></td>
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