{{-- Sub menu de Usuarios --}}
@extends('sisrd.sisrd')



@section('body')
<br>
<div class="panel">
			<pre class="panel-titulo"><h3>Opciones Usuario</h3> </pre>		
			<br />
			<ul>
				<li ><a href="{{ url('user/create') }}" class="button-xsmall pure-button"  >Registrar Usuario</a></li><br />
				<li ><a href="{{ url('user/show') }}" class="button-xsmall pure-button" >Visualizar Usuario</a></li><br />
			</ul>			
</div>
@stop
