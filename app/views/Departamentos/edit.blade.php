

{{-- formulario de registro de Unidad Curricular --}}
@extends('sisrd.sisrd')

@section('body')
<section>

<fieldset><legend>Registro de Departamento(s)</legend>
{{Form::open(['url' => 'actualizardepartamento', 'role' => 'form','class' => 'pure-form pure-form-aligned'])}}	<br>
{{Form::label('nombre','Nombre Del Departamento')}} <br>
{{Form::text('nombre',$departamento->nombre,['required','placeholder' => 'Nombre Del Departamento'])}}<br><br>
<input type="hidden" name="id" id="id" value="{{$departamento->id}}">
{{Form::submit('Editar',['class' => 'pure-button pure-button-primary'])}}  {{Form::reset('Retaurar',['class' => 'pure-button '])}}  <a href="departamento" class='pure-button'] >Regresar</a>
{{Form::close()}}

</fieldset>


</section>
@stop