{{-- formulario de registro de Unidad Curricular --}}
@extends('sisrd.sisrd')

@section('body')

<section>
	
<h1>Datos del Departamento {{$departamento->nombre}}</h1>
<table id="datatable">
	<thead>
		<tr>
			<th>numero</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	
	</tbody>
</table>


</section>
@stop

<script type="text/javascript">
	
	$(document).ready(function(){

		$('#datatable').dataTable();


	});
</script>