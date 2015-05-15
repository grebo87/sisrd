{{-- formulario de registro de Unidad Curricular --}}
@extends('sisrd.sisrd')

@section('body')
<section>
	<div class="panel">
		<pre class="panel-titulo"><h3>Opciones De Configuración</h3> </pre><br>
		
			<ul>
				<li><a href="departamento" class="pure-button" >Departamentos Académicos</a></li><br>
				<li><a href="sedes" class="pure-button" >Sedes de la U.P.T.P "L M R"</a></li><br>
				<li><a href="{{ URL('/')}}" class="pure-button" >regresar</a></li><br>
			</ul>
				
		</div>


</section>
@stop