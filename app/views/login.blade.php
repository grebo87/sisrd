@extends('sisrd.sisrd')






                   
@section('body')
<h3>
	hola pajudo
</h3>



		{{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
                    @if(Session::has('mensaje_error'))
                        <div class="alert alert-error">{{ Session::get('mensaje_error') }}</div>
                    @endif

                    {{ Form::open(array('action' => 'AuthController@postLogin','class' => 'pure-form pure-form-aligned')) }}
                        <legend>Iniciar sesión</legend>
                        <div class="form-group">
                            {{ Form::label('username', 'Nombre de usuario') }}
                            {{ Form::text('username', Input::old('username'), array('class' => 'form-control')); }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('password', 'Contraseña') }}
                            {{ Form::password('password', array('class' => 'form-control')); }}
                        </div>
                        <div class="checkbox">
                            <label>
                                Recordar contraseña
                                {{ Form::checkbox('rememberme', true) }}
                            </label>
                        </div>
                        {{ Form::submit('Enviar', array('class' => 'input add')) }}
                        
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-plus"></i></span><input id="name" type="text" placeholder="Username"  >
        </div>


        <div  class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span><input  id="password" placeholder="Contraseña" type="password" size="12">

                    {{ Form::close() }}


        
@stop