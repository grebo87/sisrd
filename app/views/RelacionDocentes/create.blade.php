{{--Muestra el formulario de registro de la relacion --}}
@extends('sisrd.sisrd')

@section('body')
				<section id="seciion">
						
						@if ($relaciondocentes) {{--verifica si hay una configuracion o relacion Activa --}}

												<h3>Editar la Relación</h3>
												<br>
												{{ Form::open(array('action' => 'RelacionDocentesController@update','class' => 'pure-form pure-form-aligned')) }}
																<label>TSU Lapso: 
																{{Form::select('lapso',array('' => 'Seleccione', 'I' => 'I','II' => 'II'), $relaciondocentes->lapso , array('required'))}}
																</label>

																<label>A&ntilde;o 
																{{Form::selectRange('fechalapso', date('Y')-5, date("Y")+8, $relaciondocentes->fechalapso, ['required'])}}

	 															</label>
																<br />

																<label>PNF Trimestre: 
																{{Form::select('trimestre',array('' => 'Seleccione', 'I' => 'I','II' => 'II','III' => 'III'),$relaciondocentes->trimestre,array('required'))}}
																</label>


																<label>A&ntilde;o
																{{Form::selectRange('fechatrimestre',date('Y')-5,date("Y")+8,$relaciondocentes->fechatrimestre,array('required'))}}<br/>
																</label><br />
																<label>Fecha de Inicio <input type="date" id="fechainicio" name="fechainicio" required value="{{$relaciondocentes->fechainicio}}"/></label>
																<label>Fecha de Cierre <input type="date" id="fechafinal" name="fechafinal" required value="{{$relaciondocentes->fechafinal}}" /></label><br /><br />
																<input type="hidden" id="id" name="id" value="{{$relaciondocentes->id}}" />

																{{Form::submit('Editar',['class' => 'pure-button pure-button-primary'])}}   {{Form::reset('Restaurar',['class' => 'pure-button'])}}   {{HTML::link('relacion','Regresar',['class' => 'pure-button'])}}


												{{ Form::close() }}


						@else

												<h3>Crear la Relación</h3>
												<br>
												{{ Form::open(array('action' => 'RelacionDocentesController@store','class' => 'pure-form pure-form-aligned')) }}
															{{Form::label('lapso','TSU Lapso:')}}
															{{Form::select('lapso',array('' => 'Seleccione', 'I' => 'I','II' => 'II'),'',array('required'))}}
															{{Form::label('fechaLapso','Año')}}
															{{Form::selectRange('fechalapso',date('Y')-5,date("Y")+8,array('required'))}} <br/>
															{{Form::label('trimestre','PNF Trimestre')}}
															{{Form::select('trimestre',array('' => 'Seleccione', 'I' => 'I','II' => 'II','III' => 'III'),'',array('required'))}}
															{{Form::label('fechaTrimestre','Año')}}
															{{Form::selectRange('fechatrimestre',date('Y')-5,date("Y")+8,array('Seleccione'),['required'])}}<br/>
															{{Form::label('fechaInicio','Fecha de Inicio')}}
															{{Form::input('date','fechainicio','',array('required'))}}
															{{Form::label('fechaFinal','Fecha de Cierre')}}
															{{Form::input('date','fechafinal','',array('required'))}}	<br/><br>
															{{Form::submit('Guardar',['class' => 'pure-button pure-button-primary', 'id' => 'guardar'])}} {{Form::reset('Limpiar',['class' => 'pure-button '])}} {{HTML::link('relacion','Regresar',['class' => 'pure-button '])}}
												{{ Form::close() }}
												<br><br>
												<div id="note">
													<p><strong>NOTA: </strong> Debe Elegir el año del Lapso y Trimestre</p>
												</div>
						@endif
				</section>
@stop
