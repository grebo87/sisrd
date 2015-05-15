{{--Muestra el formulario de registro de la relacion --}}
@extends('sisrd.sisrd')

@section('body')
		
		<section id="seciion">

								<h2>RELACIÓN DE PERSONAL DOCENTE</h2>
								<h2>TSU LAPSO {{ $relacion->lapso}} - {{ $relacion->fechalapso }} - PNF TRIMESTRE {{ $relacion->trimestre }} {{ $relacion->fechatrimestre }}</h2>

								<table id="data" >
									
									<thead>
										<tr>
											<th>#</th>
											<th>Departamento Academico</th>
											<th>Estado</th>
										</tr>
									</thead>
									<tbody>
									@foreach($estados as $value)
										<tr>
											<td>{{ $i++ }}</td>
											<td>{{$value['departamento']}}</td>
											<td>
													@if($value['estado'] === 1)
													Aprobado
													@endif
													@if($value['estado'] === 2)
													En Proceso
													@endif
													@if($value['estado'] === 0)
													En Corrección
													@endif
											</td>
										</tr>

									@endforeach
									
										
									</tbody>
								</table>

		</section>

@stop