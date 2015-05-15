{{--plantilla principal de las vistas--}}

<!DOCTYPE html>
	<html lang="es">

			<head>
					<meta charset="utf-8">

    				<title>@yield('title','SISRD v.4')</title>
					@section('head')
							{{ HTML::style('css/style.css') }}
  	  						{{ HTML::style('css/datatable/jquery.dataTables.css') }}
  	  						{{ HTML::style('css/forms.css') }}
  	  						{{ HTML::style('css/buttons.css') }}
  	  						{{ HTML::style('css/menus.css') }}
  	  						{{ HTML::style('css/font-awesome.css') }}
  	  						{{ HTML::style('css/glyphicon.css') }}
      
  
    				@show
	
			</head>
			<body>

					<main role="main">

							<header>
			
							</header>

							<br clear="all">

							<nav class="pure-menu pure-menu-open pure-menu-horizontal">
									<ul>
										<li><a href=""> Inicio</a></li>
										<li><a class="" onclick="titulo();" href="{{ URL('user')}}">Usuario</a></li>
										<li><a class="" href="{{ URL('docente')}}">Docentes</a></li>
										<li><a class="" href="{{ URL('saber')}}">Unidad Curricular</a></li>
										<li><a class="" href="{{ URL('relacion')}}">Relacion</a></li>
										<li><a class="" href="{{ URL('config') }}">Configuracion</a></li>
										<li><a class="" href="">Reportes</a></li>
										<li><a class="" href="">Ayuda</a></li>
										<li id="user" ><a href="#">Salir</a></li>
									</ul>
							</nav>
							<hr>
							<br clear="all">
							@if(Session::has('message'))
													
									<div id="message" class="{{Session::get('class')}}">{{ Session::get('message')}}</div>
							@endif

							
							@if($errors->has())

								<div id="errors" class="{{Session::get('class')}}">
													
										@foreach ($errors->all('<p>:message</p>') as $msg)
															{{$msg}}
										@endforeach
								</div>
							@endif
							<br clear="all">

							@yield('body')
							<br>
							<hr>
							<footer>
										<br>
											<p>
												Desarrollado con Tecnologias Libres
											</p>
							</footer>

					</main>
	
			
					{{ HTML::script('js/query.js') }}
					{{ HTML::script('js/datatable/jquery.dataTables.js') }}
					{{ HTML::script('js/functions.js') }}
					{{ HTML::script('js/docentes/functions.js') }}
					{{ HTML::script('js/saberes/functions.js') }}
					{{ HTML::script('js/relacion/functions.js') }}
					{{ HTML::script('js/user/functions.js') }}
			</body>
	</html>
