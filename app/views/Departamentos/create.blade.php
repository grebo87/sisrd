{{-- formulario de registro de Unidad Curricular --}}
@extends('sisrd.sisrd')

@section('body')


<fieldset><legend>Registro de Departamento(s)</legend>
{{Form::open(['url' => 'guardardepartamento', 'role' => 'form', 'class' => 'pure-form pure-form-aligned'])}} <br>
{{Form::label('nombre','Nombre Del Departamento')}} <br>
{{Form::text('nombre','',['required','placeholder' => 'Nombre Del Departamento'])}}<br><br>

{{Form::submit('Guardar',['class' => 'pure-button pure-button-primary'])}}  {{Form::reset('Limpiar',['class' => 'pure-button '])}}  <a href="departamento"  class="pure-button" >Regresar</a>
{{Form::close()}}

</fieldset>


</section>
@stop