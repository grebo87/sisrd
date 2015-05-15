{{-- formulario de registro de Unidad Curricular --}}
@extends('sisrd.sisrd')

@section('body')
<section>


<fieldset><legend>Registro de Sede(s)</legend>
{{Form::open(['url' => 'guardarsede', 'role' => 'form','class' => 'pure-form pure-form-aligned'])}}	<br>
{{Form::label('nombre','Nombre De la Sede')}} <br>
{{Form::text('nombre','',['required','placeholder' => 'Nombre Del Sede'])}}<br><br>
{{Form::submit('Guardar',['class' => 'pure-button pure-button-primary'])}}  {{Form::reset('Limpiar',['class' => 'pure-button '])}}  <a href="sedes" class ='pure-button ' >Regresar</a>
{{Form::close()}}

</fieldset>


</section>
@stop
