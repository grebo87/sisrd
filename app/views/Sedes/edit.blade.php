{{-- formulario de registro de Unidad Curricular --}}
@extends('sisrd.sisrd')

@section('body')
<section>

<fieldset><legend>Registro de Sede {{$sede->nombre}}</legend>
{{Form::open(['url' => 'actualizarsede', 'role' => 'form', 'class' => 'pure-form pure-form-aligned'])}} <br>	
{{Form::label('nombre','Nombre De la Sede')}} <br>
{{Form::text('nombre',$sede->nombre,['required','placeholder' => 'Nombre Del Sede'])}}<br><br>
<input type="hidden" name="id" id="id" value="{{$sede->id}}">
{{Form::submit('Editar',['class' => 'pure-button pure-button-primary'])}}  {{Form::reset('Restaurar',['class' => 'pure-button '])}}  <a href="sedes" class='pure-button' >Regresar</a>
{{Form::close()}}

</fieldset>


</section>
@stop